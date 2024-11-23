jQuery(document).ready(function($) {
	
	if (window.location.pathname === '/salts_questionnaire/' || 
		window.location.pathname === '/expert-system/') {
		// Если возникают вопросы по работе с анкетой - писать в тг @dmalfed
		// (Я понимаю, что писать все в общий модуль - плохо, sorry.
		// Но более адекватного пути реализации данного функционала в WP я не нашел)
		// Все что описано ниже имеет отношение только к странице /salts_questionnaire/

		function createPaymentIdStore() {
			let paymentIdFromLS = localStorage.getItem('payment_id');

			function setPaymentIdFromLS(newVal) {
				paymentIdFromLS = newVal;
			}

			function getPaymentIdFromURL() {
				const url = new URL(document.location.toString());
				return url.searchParams.get("payment_id");
			}

			function getPaymentId() {
				return paymentIdFromLS || getPaymentIdFromURL();
			}

			return {
				setPaymentIdFromLS,
				getPaymentIdFromURL,
				getPaymentId,
			};
		}
		const paymentIdStore = createPaymentIdStore()


		// localStorage overrides ------
		// Иначе мы не можем отследить изменения в lS
		class LocalStorageWrapper {
			setItem(key, value) {
				if (key === 'payment_id') {
					paymentIdStore.setPaymentIdFromLS(value)
				}
				return localStorage.setItem(key, value);
			}

			removeItem(key) {
				if (key === 'payment_id') {
					paymentIdStore.setPaymentIdFromLS(undefined)
				}
				return localStorage.removeItem(key);
			}
		}
		const localStorageWrapper = new LocalStorageWrapper()
		// --------


		// Сброс страницы до начального состояния
		const handleErrorScenario = () => {
			// чистим url и localStorage
			localStorageWrapper.removeItem('payment_id')

			const url = new URL(document.location.toString());
			url.searchParams.delete('payment_id')
			window.history.replaceState({}, '', url.toString());

			// Отображаем кнопку-триггер модалки оплаты
			// $('#start-payment-btn').attr('style', 'display: block')

			// Отображаем wrapper для кнопки-триггер модалки оплаты
			$('#start-payment-btns-wrapper').attr('style', 'display: block')
		}

		if (paymentIdStore.getPaymentId()) {
			// проверяем наличие в БД подобной анкеты и то, что она не была пройдена
			$.ajax({
				url: my_ajax_obj.ajaxurl,
				type: 'POST',
				data: {
					action: 'check_payment_record',
					payment_id: paymentIdStore.getPaymentId()
				},
				success: function(response) {
					if (response.success) {
						const wasCompleted = response.data.completion === '1'

						if (wasCompleted) {
							handleErrorScenario()
						} else {
							// Если взяли paymentId не из localStorage - синхронизируем
							if (!paymentIdStore.paymentIdFromLS) {
								localStorageWrapper.setItem('payment_id', paymentIdStore.getPaymentId())
							}

							// Если взяли paymentId не из URL - синхронизируем
							if (!paymentIdStore.getPaymentIdFromURL()) {
								const url = new URL(document.location.toString());
								url.searchParams.set('payment_id', paymentIdStore.getPaymentId())
								window.history.replaceState({}, '', url.toString());
							}

							// Отображаем анкету, пробрасываем в нее payment_id
							$('#questionnaire-description').attr('style', 'display: none')
							$('#salts_questionnaire').attr('style', 'display: block')
						}
					} else {
						handleErrorScenario()
// 						console.error('Error:', response.data.message);
					}
				},
				error: function(xhr, status, error) {
					handleErrorScenario()
// 					console.error('AJAX Error:', status, error);
				}
			})	
		} else {
			// Отображаем кнопку-триггер модалки оплаты
			handleErrorScenario()
		}


		// Функция для обновления значения флага в соответствующей записи (например, человек прошел анкету)
		const changeQuestionnaireCompletion = (paymentId, newFlagValue) => {
			$.ajax({
				url: my_ajax_obj.ajaxurl,
				type: 'POST',
				data: {
					action: 'update_completion_flag',
					payment_id: paymentId,
					completion: newFlagValue ? 1 : 0
				},
				success: function(response) {
// 					if (response.success) {
// 						// Обработка успешного ответа
// 						console.log('Flag updated:', response.data.message);
// 					} else {
// 						// Обработка ошибки
// 						console.error('Error:', response.data.message);
// 					}
				},
				error: function(xhr, status, error) {
// 					console.error('AJAX Error:', status, error);
				}
			});
		}

		const handleSendEmailWithDiscount = (paymentId, data) => {
			$.ajax({
				url: my_ajax_obj.ajaxurl,
				type: 'POST',
				data: {
					action: 'handle_questionnaire_completion',
					user_email: data.form.email,
					payment_id: paymentId,
					results: JSON.stringify(data.results),
				},
				success: function(response) {
// 					console.log('Письмо со скидкой успешно отправлено');
				},
				error: function(xhr, status, error) {
					console.error('Ошибка при отправке письма:', status, error);
				}
			})
		}


		// Обработчик для перехвата выполнения анкеты в iframe - меняем значение флага completion
		const windowMessageListener = function(event) {
			// В анкете для postMessage есть типы:
			// QUESTIONNAIRE_IFRAME_READY - приложение успешно замаунтилось - с ним можно взаимодействовать
			// QUESTIONNAIRE_COMPLETE - анкета выполнена
			// NEW_QUESTIONNAIRE - человек хочет снова пройти анкету
			const questionnaireIframeWrapper = document.getElementById('salts_questionnaire')
			const questionnaireIframe = questionnaireIframeWrapper.querySelector('iframe')

			if (questionnaireIframeWrapper && questionnaireIframe && questionnaireIframe.src) {
				const urlObject = new URL(questionnaireIframe.src);
				const questionnaireIframeOrigin = urlObject.origin

				if (event.origin === questionnaireIframeOrigin) {
					// QUESTIONNAIRE_IFRAME_READY
					// Удостоверяемся что приложение замаунтилось и ради мнимой безопасности прокидываем туда paymentId
					if (event.data.type === 'QUESTIONNAIRE_IFRAME_READY' && paymentIdStore.getPaymentId()) {					
						questionnaireIframe.contentWindow.postMessage({
								type: 'INITIAL_PAYLOAD',
								content: {
									paymentId: paymentIdStore.getPaymentId()
								}
							},
							'*'
						)
					}

					// QUESTIONNAIRE_COMPLETE
					if (event.data.type === 'QUESTIONNAIRE_COMPLETE') {
						console.log(event)

						changeQuestionnaireCompletion(paymentIdStore.getPaymentId(), true)

						handleSendEmailWithDiscount(paymentIdStore.getPaymentId(), event.data.content)
					}

					// NEW_QUESTIONNAIRE
					if (event.data.type === 'NEW_QUESTIONNAIRE') {
						$('#salts_questionnaire').attr('style', 'display: none')
						$('#questionnaire-description').attr('style', 'display: block')

						handleErrorScenario()
					}
				}
			}
		}
		window.addEventListener('message', windowMessageListener)
		window.onbeforeunload = () => {
			window.removeEventListener('message', windowMessageListener)
		}

		// Обработчик кнопок оплаты - открываем модалку, показываем в ней платежную форму
		// Перед этим генерируем сам платеж
		$(".js-start-payment-btn").on('click', function() {
			$('#payment-modal').attr('style', 'display: block')

			$.ajax({
				url: my_ajax_obj.ajaxurl,
				type: 'POST',
				data: {
					action: 'start_payment',
					summ: $(this).attr('data-summ')
				},
				success: function(response) {				
					if (response.success) {
					    console.log(response)
					    
						const checkout = new window.YooMoneyCheckoutWidget({
							confirmation_token: response.data.data.confirmation.confirmation_token,
							error_callback: function(error) {
							   console.log(error)
							}
						});

						$('#close-payment-modal-btn').on('click', () => checkout.destroy())

						checkout.on('complete', (data) => {
							if (data.status === 'success') {
								// $('#start-payment-btn-1200').attr('style', 'display: none')
								$('#start-payment-btns-wrapper').attr('style', 'display: none')

								localStorageWrapper.setItem('payment_id', response.data.data.id)

								const newUrl = new URL(document.location.toString());
								newUrl.searchParams.set('payment_id', response.data.data.id)
								window.history.replaceState({}, '', newUrl.toString());

								$('#payment-modal').attr('style', 'display: none')
								$('#questionnaire-description').attr('style', 'display: none')
								window.scrollTo(0, 0)
								$('#salts_questionnaire').attr('style', 'display: block')
							}

							checkout.destroy();
						});

						// Отображение платежной формы в контейнере
						checkout.render('payment-form')
					} else {
 						alert('Ошибка при создании платежа.');
					}
				},
				error: function() {
 					alert('Ошибка при соединении с сервером.');
				}
			});
		})

	}
});

