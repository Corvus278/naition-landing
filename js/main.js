document.addEventListener('DOMContentLoaded', () => {
    const registrationSection = document.getElementById('registration');
    const form = document.getElementById('registration-form');
    const message = document.getElementById('form-message');
    const registerButtons = document.querySelectorAll('.btn-register');

    const orderTariff = document.getElementById('order-tariff');
    const purposeField = form ? form.querySelector('textarea[name="purpose"]') : null;
    const purposeChips = document.querySelectorAll('.purpose-chip');

    registerButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const card = button.closest('.pricing-card');

            if (card && orderTariff) {
                const tariff = card.dataset.tariff;
                const price = card.dataset.price;

                if (tariff && price) {
                    orderTariff.textContent = `${tariff} — ${price}`;
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
            if (!purposeField) {
                return;
            }

            purposeField.value = chip.dataset.purpose || '';
            purposeField.dispatchEvent(new Event('input', { bubbles: true }));
            purposeField.dispatchEvent(new Event('change', { bubbles: true }));

            purposeChips.forEach((item) => {
                item.classList.toggle('selected', item === chip);
            });
        });
    });

    if (purposeField) {
        purposeField.addEventListener('input', () => {
            const typed = purposeField.value.trim();
            const match = [...purposeChips].find((chip) => chip.dataset.purpose === typed);

            purposeChips.forEach((item) => {
                item.classList.toggle('selected', item === match);
            });
        });
    }

    if (!form) {
        return;
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

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
                message.textContent = 'Заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.';
                message.className = 'form-message success';
            }

            form.reset();
            purposeChips.forEach((item) => item.classList.remove('selected'));
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
