Submenu Tree
October 2007

For instructions on upgrading from Submenu Tree 0.3 to 0.4, please see below. 

============
Introduction
------------

For those nodes which are menu items and displayed as such, this module can append or prepend a listing of the submenu items underneath that node. The submenu items can be themed as a submenu, a list of titles, a list of teasers, or a list of full nodes. 

This module is yet another solution to the long standing issue of hierarchical content in Drupal, hence it attempts to solve problems which other people have used modules such as book.module, taxonomy.module, category.module, menutree.module, and menupage.module to address. Submenu Tree aims to be a convenient and lightweight complement to these modules. 

Submenu Tree presumes you are using the Drupal menu system for organising a hierarchy. 

Here are some possible reasons why you might consider Submenu Tree over other modules. 

Book, Taxonomy, Category:

Submenu Tree is much easier to set up than these modules and there is very little configuration. If Submenu Tree doesn't fit your needs, then feel free to explore these other modules. 

Menutree, Menupage:

Menutree and Menupage both allows for a menu to be displayed as a separate page. However, there is no way to have associated content. Furthermore with menupage, nodes can be placed only at the leaves of a menu. 

Submenu Tree provides for content such as an introduction, header, or image to accompanying the menu listing. It can also display the submenu items in other ways ie teaser, full nodes. With theming, you can render the submenu items any way you wish. 

Please note Submenu Tree is not related to Menutree in any way. It is named similarly because it offers something similar. 

Blocks:

Submenu Tree allows the submenu items to be displayed within content or in a block. Displaying in a block allows you to move the blocks to wherever you wish. 

Breadcrumbs:

Since Submenu Tree uses the Drupal menu system, breadcrumbs work automatically. 

Submenu Titles:

Submenu Tree allows you to change the title of the submenu to whatever you wish. 

Sibling Menu:

Submenu Tree now also provides a sibling menu tree, which is an analogous feature displaying the items at the same menu level as the node ie. instead of displaying a submenu, it displays the submenu of its parent. 

Note that, in practice, this may not quite be what it sounds. YMMV.



=====
Usage
-----

0. Install Submenu Tree as like any module ie. unzip and copy the files into sites/all/modules/submenutree (or use your own method if you know what you are doing)

1. Goto Administer >> Site Building >> Modules and enable Submenu Tree. 

That's installation done. 

When you are editing a node, you should now see a section entitled Menu Settings -> Submenu Tree Settings. Make your selection there and click Submit. 

If you disable submenu trees for your node, the settings are lost for that node. 

Please also note Submenu Tree will only take effect if you are viewing a node which is part of a Drupal menu. If you are viewing a node which is not part of a menu, this module will seem to do nothing. 


=========
Upgrading
---------

Version 0.3 -> 0.4

There were some significant changes between versions 0.3 and 0.4. Among other things, the database table schema changed, there was some code refactoring, and the API for the themeable functions changed as well. If you are upgrading from 0.3 to 0.4, please be aware of this and test thoroughly. 

In particular, if you have overridden the themeable functions, then you must adjust them accordingly. 

To upgrade from 0.3 to 0.4, there are two ways. For either, it is highly recommended that you BACK UP your database first. 

The first and recommended way is:

1. Disable the module (version 0.3), uninstall it, and remove it entirely from sites/all/modules/submenutree (or wherever you have installed the module)

2. Install the module (version 0.4) and then reconfigure all your nodes

Unfortunately, all your settings will be lost so you'll have to redo them. 

The second way is if you're feeling lazy or you don't mind taking risks. It has been tested to work, and should work, but you have been warned. 

1. In sites/all/modules/submenutree (or wherever you have installed the module), overwrite version 0.3 with version 0.4

2. Use the database update script update.php (which you can also reach from Home >> Administer >> Logs >> Status Report) to run update #5001 for Submenu Tree

If the update is successful, it should migrate all your existing Submenu Tree-ed nodes to the new schema. 


=======
Credits
-------

Submenu Tree contributed by ThinkLeft (http://thinkleft.com)

Please see the website for more information or if enquiring about commercial Drupal or other non-Drupal technology services. 



