document.addEventListener('DOMContentLoaded', () => {
    const registrationSection = document.getElementById('registration');
    const form = document.getElementById('registration-form');
    const message = document.getElementById('form-message');
    const registerButtons = document.querySelectorAll('.btn-register');

    const orderTariff = document.getElementById('order-tariff');
    const purposeField = form ? form.querySelector('textarea[name="purpose"]') : null;
    const purposeChips = document.querySelectorAll('.purpose-chip');

    const selectChip = (chip) => {
        if (!purposeField || !chip) {
            return;
        }

        purposeField.value = chip.dataset.purpose || '';
        purposeChips.forEach((item) => item.classList.toggle('selected', item === chip));
    };

    const defaultChip = document.querySelector('.purpose-chip[data-default="true"]') || purposeChips[0];

    const syncChips = () => {
        if (!purposeField) {
            return;
        }

        const typed = purposeField.value.trim();
        const match = [...purposeChips].find((chip) => chip.dataset.purpose === typed);

        purposeChips.forEach((item) => item.classList.toggle('selected', item === match));
    };

    // Цель курса предзаполнена: посетителю остаётся ввести имя и телефон.
    // Chrome восстанавливает значения полей после DOMContentLoaded, поэтому
    // дефолт проставляется ещё раз на load — но только если поле пустое.
    const applyDefaultPurpose = () => {
        if (!purposeField) {
            return;
        }

        if (purposeField.value.trim() === '') {
            selectChip(defaultChip);
            return;
        }

        syncChips();
    };

    applyDefaultPurpose();
    window.addEventListener('load', applyDefaultPurpose);

    registerButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const card = button.closest('.pricing-card');

            if (card && orderTariff) {
                const tariff = card.dataset.tariff;
                const price = card.dataset.price;
                const split = card.dataset.split;

                if (tariff && price) {
                    orderTariff.textContent = split
                        ? `${tariff} — ${price} или ${split} Сплитом`
                        : `${tariff} — ${price}`;
                }

                document.querySelectorAll('.pricing-card').forEach((item) => {
                    item.classList.toggle('selected', item === card);
                });
            }

            if (!registrationSection) {
                return;
            }

            registrationSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    purposeChips.forEach((chip) => {
        chip.addEventListener('click', () => {
            selectChip(chip);

            if (purposeField) {
                purposeField.dispatchEvent(new Event('input', { bubbles: true }));
                purposeField.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });

    if (purposeField) {
        purposeField.addEventListener('input', syncChips);
    }

    // Таймер до конца записи: сегодняшние сутки, без перезапуска и накрутки.
    const countdownTargets = [
        document.getElementById('topbar-countdown'),
        document.getElementById('final-countdown'),
    ].filter(Boolean);

    if (countdownTargets.length > 0) {
        const deadline = new Date();
        deadline.setHours(23, 59, 59, 999);

        const renderCountdown = () => {
            const left = Math.max(0, deadline.getTime() - Date.now());
            const hours = Math.floor(left / 3600000);
            const minutes = Math.floor((left % 3600000) / 60000);
            const seconds = Math.floor((left % 60000) / 1000);
            const text = `${hours} ч ${String(minutes).padStart(2, '0')} мин ${String(seconds).padStart(2, '0')} с`;

            countdownTargets.forEach((node) => {
                node.textContent = text;
            });
        };

        renderCountdown();
        setInterval(renderCountdown, 1000);
    }

    if (!form) {
        return;
    }

    // Инлайн-валидация только двух обязательных полей.
    const requiredFields = [...form.querySelectorAll('input[required]')];

    const showFieldError = (input, text) => {
        const label = input.closest('label');
        let error = label ? label.querySelector('.field-error') : null;

        if (!text) {
            input.classList.remove('invalid');
            if (error) {
                error.remove();
            }
            return;
        }

        input.classList.add('invalid');

        if (!error && label) {
            error = document.createElement('p');
            error.className = 'field-error';
            label.appendChild(error);
        }

        if (error) {
            error.textContent = text;
        }
    };

    const validateField = (input) => {
        const value = input.value.trim();

        if (value === '') {
            showFieldError(input, input.name === 'phone' ? 'Укажите телефон для звонка.' : 'Укажите имя.');
            return false;
        }

        if (input.name === 'phone' && value.replace(/\D/g, '').length < 10) {
            showFieldError(input, 'Телефон слишком короткий — проверьте номер.');
            return false;
        }

        showFieldError(input, '');
        return true;
    };

    requiredFields.forEach((input) => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => {
            if (input.classList.contains('invalid')) {
                validateField(input);
            }
        });
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const invalid = requiredFields.filter((input) => !validateField(input));

        if (invalid.length > 0) {
            invalid[0].focus();
            return;
        }

        const submitButton = form.querySelector('button[type="submit"]');
        const formData = new FormData(form);

        if (submitButton instanceof HTMLButtonElement) {
            submitButton.disabled = true;
        }

        if (message) {
            message.textContent = '';
            message.className = 'form-message';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });

            const data = await response.json();

            if (!response.ok || !data.ok) {
                throw new Error(data.error || 'Не удалось отправить заявку.');
            }

            if (message) {
                message.textContent = 'Место забронировано. Менеджер перезвонит в течение рабочего дня, подтвердит место и ответит на вопросы. Оплата — после подтверждения.';
                message.className = 'form-message success';
            }

            form.reset();
            selectChip(defaultChip);

            try {
                if (typeof window.ym === 'function') {
                    window.ym(110974111, 'reachGoal', 'order');
                }
            } catch (metrikaError) {
                // Аналитика не должна ломать подтверждение заявки.
            }
        } catch (error) {
            if (message) {
                message.textContent = error instanceof Error ? error.message : 'Не удалось отправить заявку.';
                message.className = 'form-message error';
            }
        } finally {
            if (submitButton instanceof HTMLButtonElement) {
                submitButton.disabled = false;
            }
        }
    });
});
