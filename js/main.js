document.addEventListener('DOMContentLoaded', function () {
  /* scroll */
  const links = document.querySelectorAll("a[href^='#']");
  links.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = link.getAttribute('href');

      const targetElement = document.querySelector(targetId);

      if (targetElement) {
        const yOffset = -10;
        const yPosition = targetElement.getBoundingClientRect().top + window.pageYOffset + yOffset;

        window.scrollTo({
          top: yPosition,
          behavior: 'smooth',
        });
      }
    });
  });

  /* timer */
  function updateTimers() {
    var Now = new Date(),
      Finish = new Date();
    Finish.setHours(23);
    Finish.setMinutes(59);
    Finish.setSeconds(59);
    if (Now.getHours() === 23 && Now.getMinutes() === 59 && Now.getSeconds() === 59) {
      Finish.setDate(Finish.getDate() + 1);
    }
    var sec = Math.floor((Finish.getTime() - Now.getTime()) / 1000);
    var hrs = Math.floor(sec / 3600);
    sec -= hrs * 3600;
    var min = Math.floor(sec / 60);
    sec -= min * 60;

    var timers = document.querySelectorAll('.timer');
    timers.forEach(function (timer) {
      timer.querySelector('.hours').innerHTML = pad(hrs);
      timer.querySelector('.minutes').innerHTML = pad(min);
      timer.querySelector('.seconds').innerHTML = pad(sec);
    });

    setTimeout(updateTimers, 1000);
  }

  function pad(s) {
    s = ('00' + s).slice(-2);
    return '<span>' + s[0] + '</span><span>' + s[1] + '</span>';
  }

  updateTimers();
});
