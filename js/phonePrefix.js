document.addEventListener('DOMContentLoaded', function () {
  const phonePrefix = '+380';

  const phoneCheck = function (elem, isFocus) {
    const elemName = elem.getAttribute('name'),
      form = elem.closest('form'),
      value = elem.value.trim();

    if (isFocus && elem.checkValidity() === false) {
      return false;
    }

    if (elemName !== 'phone') {
      const phoneElem = form.querySelector('[name=phone]'),
        phoneValue = phoneElem.value;

      if (phoneValue === phonePrefix || phoneValue.length < phonePrefix.length) {
        phoneElem.value = '';
      }
      return true;
    }
  };

  document.addEventListener(
    'focus',
    function (e) {
      if (e.target.matches('.main-order-form [type=text], .main-order-form [type=tel]')) {
        const elem = e.target;
        phoneCheck(elem, true);
      }
    },
    true,
  );

  document.addEventListener('click', function (e) {
    if (e.target.matches('.main-order-form [type=text], .main-order-form [type=tel]')) {
      const elem = e.target;
      phoneCheck(elem, false);
    }
  });

  document.addEventListener('keypress', function (e) {
    if (e.target.matches('.main-order-form [name=phone]')) {
      const elem = e.target,
        elemValue = elem.value.trim();

      // Запрещаем ввод, если не цифры или не "+" в начале
      if (!/[\d\+]/.test(e.key)) {
        e.preventDefault();
      }

      if (elemValue === '' && e.key === '3') {
        elem.value = phonePrefix;
      }

      if (elemValue.length >= 13) {
        e.preventDefault();
      }

      if (elemValue.length > 0 && e.key === '+') {
        e.preventDefault();
      }
    }
  });

  document.addEventListener('input', function (e) {
    if (e.target.matches('.main-order-form [name=phone]')) {
      const elem = e.target,
        elemValue = elem.value.trim();

      if (!elemValue.startsWith(phonePrefix)) {
        elem.value = phonePrefix;
      }

      // Ограничиваем ввод номера только цифрами и префиксом "+380"
      elem.value = elem.value.replace(/[^+\d]/g, '');
    }
  });
});
