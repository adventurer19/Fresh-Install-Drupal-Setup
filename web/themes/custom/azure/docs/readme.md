when you visit drupal.org to review available themes for your drupal version
,you'll find many of the most popular themes actually starter themes.
If you install a starter or base theme . and look at your site you will probably
be underwhelmed.This is because these projects expect you , the themer,
to use the theme as a starting point for your custom design.The most popular starter
themes are often very flexible,
they may allow several different configurations,
or they may provide a solution for a common design problem.

What are base or starter themes ??
Base themes and starter themes are two phrases for the same thing.
Thems that have been customized on the markup , javasciprt and template side of things, but leave the css and image assets a black state
for further development by another themer.

What are SubThemes ?

Subthems are themes that inherit attributes from a base theme, but polish 
or refine them further by adding their own customizedf css,images,and other assets.
Why you can use any theme as a base theme, the community has an array of flexible and full-featured base thems you can download. You can also useany of drupal's core themes as base theme.
Drupal's core themes as base theme..

By default , drupal has several themes that come with it by default

classy 
bartik
seven stable
startk

Seven is admin theme..
it styles the administrative areas that you see as an administrator , ubt does not astyle the rest of the site that regular site 
visitor sees.

Bartik is the reverse; it styles the site that the visitor sees, but not the administrative area.
When designing drupal 8 , contributors did a poll of themers at drupalcon to find out opinions about theming,
They found that about two-third of themers wanted some default markup that was sensible and didn't require a bunche of template overrides.
The other third wanted clean markup a very minimal base where they could add their own classes and markup at  will..
2/3 wanted some default markup that was sensisble and didn't require a bunch of template overrides.

This resulted in drupla making two new core base themes; Classy ,w hich takes the senseible approach
provides marakup and default classes you can use as styling hook.
This is similar to drupal 7 default markup approach, ubt with classes and markup
significantly improved.
Classy allows you to tweak the classes drupal provides as a starting point.
Here is a list of available classy theme css selectors...

Stable takes the clean or minimal approach and expect the themer to jump in and only add clases where they are essential.
Stable still have some classes needed for frontend ui components like the toolbars and contextual links ,but in general has far fewer classes than Classy,
and even fewer wrapper elements.
Stable is copy of the drupal core templates that will not change . It is the default base theme for every theme that does not define a specific base theme unless base theme false is set in yml file.


In a nutshell stable/classy are base themes
Classy provides markup and default classes you can use as styling hooks.
and stable have fewer classes than classy ,

Finally stark is a theme that's inteded to be a tool for themers.
It uses Drupal's default html markup and css 
styles with no base theme. It is meant for you to use when you styind drupals'default markup
as it won't have changes from other themes interfering,
and it can also be used as troubleshooting toool to see if module relates css /js are causing issue.


Finally , stark is a theme that's inteded to be a tool for themers. It uses Drupal default html markup and css styles with no base theme.
It is mean for you to use when you are studing Drupal's default markup as it won't have changes from other themes interfering , and it can also be used as a 



Inheriting a base themes' resources is as easy as declarying it in your info .yml file 
just add declaration key for base theme and set the value to the machina me of the base theme project

base theme: classy
so you could use this example by replacing classy with the machine name of the theme you want to use as your base
For rxample if you were to use Bartik ,you'd enter bartik there instead.


CLaro is default admin theme of drupal 10, and olivero is default theme for users...

