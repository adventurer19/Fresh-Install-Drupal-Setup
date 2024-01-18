services tags overview
some services have tags, which are defined in the services
deefinitions.Tags are used to define a group of related
services, or to specify some aspect of how the services ebhaves.
Typically, ifyou tag a service, your service calss must 
also inmplemen a corresponding interface..
Some common examples

access_check -> indicated a route access checking serices
cache.bin indicates a cache bin services 
event_subscriber indicates an event subscriber service.Event subscribers can be used for dynamic routing and route altering
needs_destruction indicates that a descturct method needs to be called at the end of a request to finalize operations,if this 
service was instantiated services should implament a particular interface
content_provider indicates that a block context provider, used for example by block conditions. it has to implement 
http_clinet_middleware indicates that the service provides a guzzle middleware
creating a tag for a service does not do anything on its own but tags acan be discoverd or queried in a compiler pass when the
container is build, and a corresponding action can be taken.
