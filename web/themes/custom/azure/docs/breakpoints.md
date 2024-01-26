What are breakpoints ?
Breakpoints are used in responsive design and consist of a label
and media query. Media queries are a formal way to encode breakpoints.
They allow a themer to implement different ways of displaying their content,based on the size 
of the viewport of the visitor.
This means a site with a flexible layout can automatically resize columns images ,etc, without having to build
without having to build multiple sites for different devices. Themes and modules can define breakpoints
by creating a config file called {theme_name}.breakpoints.yml
the naming convertion is each breakpoint follows a syntax of themename.descriptor. Each breakpoint needs to have a unique
name
If you take a look at the bartik breakpoints file you' see there are three defined

bartik.mobile
bartik.narrow
