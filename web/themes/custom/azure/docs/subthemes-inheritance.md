Subthemes are designed to inherit assets from a base theme.
This allows themers to spend less time reinventing the wheel.
and more time focusing on the front-end design.

The usage of theme files is prioritized in drupal :
Subtheme -> base theme -> core

Drupal first uses theme files from your subtheme.
If it does not find what it needs it need in the subtheme, it looks for files in the 
base theme.
If they are not there either , it looks in the core.

What if a file or asset exists both in the subtheme and in the base theme.
Drupal will use the version in the subtheme.

However , not all assets are inherited. Below are two tables outlining what you can expect to be inherited by your subtheme,
and what you will need to specify or add yourself.

Inherited by subtheme from base theme:
The following theme elements are inherited by a subtheme.
unless overriden by the themer.
.theme file
.breakpoints.
templates
libraries.
images does not include logo and svg 
js / css inherited
screenshot inherited


Assets not inherited
The following theme elements are not inherited by your subtheme. A themer will need to explicitly configure these items as the subtheme.
info.yml
logo.svg
favicon.ice
color module color module-related configuration and assets are not inherited by a subtheme.
Regions are not inherited by a subtheme.


Choosing a base theme
seleCTING A BASE THEME CAN SAVE YOU A LOT OF TIME WITH THEMING BY PROVIDING THE fundamen ta elemnts so you don't need to create them yourself. Likewise , selecting a base theme unsited  to your goal can cause more work as you strugle with strucure of the theme.Sometinhs themers are more experinec with CMS softwawre other than drupal and will inadequately convert a theme to drupal by taking
shortcuts that make sub-theming more dufficult
When evaluating a base theme conside:
What config optins does the base theme have

how many regions does it give you to work 
how active isi t is itl ike to be mainted and updated if secutity patches are avaialble ?

was it converted from a theme for a different system, if so , you ctan find any feedback from othe drupalist about their experience using it
