// $Id: README.txt,v 1.1.2.1 2008/06/15 07:30:05 somebodysysop Exp $

views_mail

OVERVIEW

The Views Mail module provides a flexible method for sending messages to
list of users created by the Views module.  

This module was originally created by KarenS and modified by somebodysysop.
Details here: http://drupal.org/node/134931

This tool is essentially a smart query builder for building e-mail
lists. 

FEATURES

-Create recipient list using Views to send mass email.
-Test mode available.
-Installs Views filters for filtering nodes by OG Group and roles.
-Can schedule emails for future delivery.
-Uses messages created as HTML newsletters in Simplenews module.
-Places group e-mail opt-out option in user's account.
-Option to force e-mail opt-out.
-Option to auto-subscribe all new signups to a newsletter.
-Option to auto-subscribe all new group members to a newsletter.

REQUIREMENTS

Views Mail requires the following modules to already be installed:

-Views (to create the email lists) http://www.drupal.org/project/views
-CCK (for userreference and nodereference) http://www.drupal.org/project/cck 
-Simplenews (to create the email messages)  http://drupal.org/project/simplenews
-Mimemail (to send emails in HTML format) http://drupal.org/project/mimemail
-Actions* (to schedule future delivery of emails) http://drupal.org/project/actions
-Scheduled Actions (to schedule future delivery of emails) 
 http://drupal.org/project/sched_act
 No 5.x version available yet, so, you'll have to patch the 4.7 version.
 Details here: http://drupal.org/node/122391

*You need actions module for the userreference and nodereference modules it supplies.
 These are necessary to automatically get the email address of the author of a node.

INSTALLING VIEWS MAIL

Make sure you have installed the required modules above and configured them.

Gunzip and untar the Views Mail tarball and place it into your modules  
folder. Navigate to Admin->Modules and click on Views Mail to intstall.

Access Control Permissions
--------------------------
Assign the user you wish to be able to configure Views Mail the 'administer views mail' 
permission.

In order to unsubscribe from a newsletter sent by Views Mail, the anonymous user role 
must have the 'subscribe to newsletters' permission in Simplenews.

In order to create a newsletter, the role must have the "create newsletter" permission
in Simplenews.

If you wish a role to be able to send *any* Views Mail newsletter, assign it the
'send views mail' permission.

If you wish a role to send only Views Mail newsletters that are created by the user, 
then assign it only the 'send own views mail' permission.

Simplenews Settings
-------------------
Admin-> Content Managment -> Newsletters -> Newsletters Tab -> Add Newsletter Link

Add a Newsletter type that you will use for creating newsletter issues that
will be used with Views Mail.  This will be referred to as your Views Mail
newsletter type.

Views Mail Settings
-------------------
Admin -> Site Configuration - > Views Mail Configuration

Default Newsletter:	

	Select the default newsletter type which will contain the
	newsletter issues you will send with Views Mail.  This
	default newsletter type should have been created in the
	Simplenews Settings step above.	 It is your default "Views Mail 
	newsletter type".

Force group e-mail opt-in:	

	When new user signs up, force the group e-mail 
	opt-in to be checked ON.  This means the option 
	will NOT appear on the user's registration
	page but will appear in the user's "My Account"
	screen.  User can uncheck the option after
	registration is completed.

Format the subject line of emails?

    When a newsletter is created, the subject line of the resulting email 
    will be prepended with the name of the newsletter group. Simplenews
    does this by default.  Uncheck this box if you want the subject of 
    the email to only contain the title of the saved newsletter.

Create Views Mail link?

    When you create a Views Mail newsletter, do you wish 
    to display a link on the bottom of this newsletter 
    which will take you to the Views Mail view you have created?

Views Mail link URL:

    Enter the URL to the Views Mail view you have created. 
    Do NOT include the ending '/'. Examples: 
    
      myviewsmailview
      og/emailmembersbyrole
      http://mywebsite.org/viewsmailview
	
	Note that you need to have already created this view in order
	to have the view URL.
 
Views Mail link title:

    Enter the title of the link.

Subscribe all new signups to newsletter:	

	Enter here a newsletter id if 
	you want all new signups to be 
	subscribed to this newsletter.

Groups whose new users are autosubscribed to newsletters:

	Enter here a group id | newsletter id pair
	if you want all new members to this group
	to be subscribed to this newsletter.

Test Settings

	"Email test mode" -	Click this on if you want to run 
	in test mode (i.e., no actual emails sent).

Views Mail Views
----------------
Admin -> Site Building - > Views - > Default Views

Views Mail creates a default view:
  
  View Name : ViewsMailOptOut	
  View Title: Views Mail Opt Out	
  
This is a view of users who have opted out of Views Mail by clicking on
the "unsubscribe" link in a newsletter they have received.
  
This view comes from the "views_mail_optout" table which contains only two
columns:

  Email address of user who has opted out
  Node ID of newsletter from which the user clicked on unsubscribe link

Any email address on this list will NOT be sent a newsletter via Views Mail 
until it is removed this list.  See http://drupal.org/node/270450 for more
details.

USING VIEWS_MAIL
================

1. Create the message you wish to send using Simplenews.  

     Create Content -> Newsletter issue

     or

     Create Newsletter issue
   
   Save it as the newsletter type you selected for Views Mail (see "Simplenews Settings"
   above). This means that on the node submission form in the "Newsletter:" pulldown menu,
   you select the Views Mail newsletter type you have previously created.

   If you have not created a Views Mail newsletter type in "Simplenews Settings", you must
   first do that.  You must also save this newsletter type as the "Default Newsletter"
   in "Views Mail Settings".

   
2. Go to views and create a View of the users you wish to send the message to.  You can 
   add exposed filters if you wish end-users to be able to customize the view.
    
   Admin -> Views -> Add View.  Don't forget to:
   
   a) Select "Views mail" as the Views Type. "Nodes per Page" should be set to "0"
      (No Paging).
   b) Select at least one field that contains the e-mail address you wish the message
      to. Otherwise, the message will be sent to the e-mail address of the node
      author.
   c) Save the view. When the view is saved, you can use the URL from this view
      if you wish to create a Views Mail link (see instructions above).

3. Go to the view you created in Step 2. Click on the "Send Mail" link to open the
   Views Mail window.  You will see these options for sending your email:

		Recipient name	:	Select the View field to use for the recipient's name.
		Recipient email	:	Select the View field to use for the recipient's email address.
		Subject			:	This is automatically created from newsletter subject line.
		Newsletter to 
		  send to this 
		  group			: 	Select the Simplenews newsletter you created in Step 1 that
							contains the message you want sent.

		Distinct		:	Select "Yes" here. Not sure what this does.

		If wish to schedule delivery of this email for a future date, you 
		can click on the "Schedule" link:

		Number			:	The number of time units below to wait before sending this
							email. Enter a number.
		Unit			:	Unit of time for the number entered above.  Seconds, Minutes,
							Hours or Days.

4. Once you have completed entering the "Send Mail" options in the Views Mail window, click 
   on the "Send" button at the bottom of this window.  You will then be given a summary
   view of all the elments you selected in Step 3 for verification.  
   
   The "Recipient List" is a list of all the email addresses to which Views Mail will
   attempt to send the selected newsletter.
   
   If you see a "Reject List", this contains the email addresses of users from the
   view who have previously unsubscribed from Views Mail.  Their email addresses
   are in the "views_mail_optout" table which you can also view using the default
   "ViewsMailOptOut" view.  Email can not be sent to these addresses until they
   are removed from this table.
   
   If all is correct,
   then click on "Confirm" to send/schedule the email.  If not, go back and correct.


DOCUMENTATION

There currently is no documentation other then this README.txt file and the original
discussions we had on creation of the module here: http://drupal.org/node/134931

You may also wish to review the issue queue here: http://drupal.org/project/issues/views_mail

-------------- IMPORTANT --------------------------------------------------
-------------- IMPORTANT --------------------------------------------------

If you update Views or any module that uses Views, you MUST MUST MUST
go and resubmit the admin/modules page. Views caches information provided
by modules, and this information MUST be re-cached whenever an update
is performed. 

DRUPAL CANNOT TELL AUTOMATICALLY IF YOU HAVE UPDATED CODE. Therefore you
must go and submit this page.

-------------- TODO ---------------------------------------------

- set up userreference and nodereference fields to use the name and email 
  of the userreference and nodereference uid
- incorporate Token module to handle substitutions
- figure out how to filter views using views_mail_optout table


CREDITS

Huge kudos to KarenS for creating the original version of this module!
