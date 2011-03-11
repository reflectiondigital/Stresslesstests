/* $Id: README.txt,v 1.1.4.1 2008/09/23 01:00:02 canen Exp $*/

search_config is used to configure the advanced search form.

Installation
------------
1. Copy entire search_config directory to the module directory of your Drupal 
   installation
2. Enable the search_config module on the admin modules page
3. Go to administer » settings » search, you should now see a 
   "Advanced search form configuration" collapsed fieldset.


General Information
-------------------
This module started out as a simple means of configuring the *display* of the
advance search form. A few features have been added since thanks to the
contributions of others.

In simple use cases the search_config module allows site admins to decide which 
fields to display on the advanced search form when enabled. This does not stop 
astute users from entering the search criteria directly into the search text 
fields. There is also the option of selecting which node types not to index.
Once selected they are also automatically removed from the advance search
form. This gives more control over the content that can be searched to those
who need it. 

Search config now has the option of choosing which search implementation
should be the default, for example, "content", "user", "apachesolr", etc. The 
regular "content" search provided by the node module is selected by default.

Three new permissions are also provided, these simple control the display of
fields per role and is useful if fields should not be removed globally from
the form.

The following fields or selected members of their groups can removed from the 
form globally or on role by role basis:

 - keywords
 - categories
 - node types

Some of what this module does can also be achieved by theming the form. 

