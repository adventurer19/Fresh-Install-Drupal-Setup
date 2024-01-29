(function (Drupal, drupalSettings) {
  Drupal.behaviors.ultras = {
    attach: function (context, settings) {
      if (drupalSettings.nikiP.slider.height) {
        let siteName = context.getElementsByClassName('site-branding__name')[0];
        if (siteName) {
          siteName.getElementsByTagName('a')[0].innerHTML = '<h1>Howdy, ' + Drupal.theme('placeholder', drupalSettings.nikiP.slider.height) + '!</h1>';
        }
      }

      const elements = once('my-once-id', '#pyramid', context);

      elements.forEach(processingCallback);
    },
  };

  function processingCallback(item, index) {
    let data = Drupal.theme();
    const paragraph = document.createElement('p');
    // Step 2 (optional): Set attributes
    paragraph.setAttribute('id', 'new-paragraph');
    paragraph.setAttribute('class', 'paragraph-class');
    let height = drupalSettings.nikiP.slider.height;
    let length = drupalSettings.nikiP.slider.length;
    paragraph.innerHTML = buildPyramid(height, length);
    //
    // Step 45: Append to the DOM
    item.appendChild(paragraph);

  }

  // Function to build the pyramid and return it as HTML string
  function buildPyramid(height, length) {
    let pyramid = '';
    for (let i = 1; i <= height; i++) {
      pyramid += '<br>'; // Move to the next line
      pyramid += ' '.repeat(length - i); // Add leading spaces
      pyramid += '*'.repeat(2 * i - 1); // Add asterisks
    }
    return pyramid;
  }

  Drupal.theme.placeholder = function (str) {
    return '<em class="placeholder">' + Drupal.checkPlain(str) + '</em>';
  };

})(Drupal, drupalSettings, once);

