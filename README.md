# Landing Pages

Create (landing) pages in your CiviCRM environment.

![animated demo](images/landingpages-demo.gif "Demo")

## Purpose

Landing pages are just HTML pages that can contain text, images, and hyperlinks.
You can use them to e.g. provide some handy shortcuts to your users, to document internal processes, to explain some best practices, etc.

See it as a mini wiki inside your CiviCRM.

## Manage Pages

Navigate to: Administer > System Settings > Landing Pages

Click on the button "Add landing page" to create your first page.

A page has the following fields:

 - Title
 - Header
 - Left column
 - Right column
 - Footer

![screenshot edit mode](images/screenshot-edit-mode.png "Edit mode")

Ony the title is mandatory.

## Page Layouts

Different page layouts can be obtained by filling in or leaving empty the different fields.

If you fill in all fields you will have a page with a header, a left column, a right column, and a footer.

![example layout 1](images/layout-hflr.png "Example Layout 1")

If you want a full width page, just fill in the header (or the footer).

![example layout 2](images/layout-full.png "Example Layout 2")

Experiment by putting your text in either the header, footer, left column, or the right column to view the different page layouts.

## Hyperlinks to Other Pages

In the rich text editor you can create hyperlinks to other pages. These can be links to existing CiviCRM pages and forms, or links to other landing pages.

The URL structure of a landing page is: /civicrm/landingpage/show?id=ID&reset=1

Replace ID with the unique number of the corresponding page. See Administer > System Settings > Landing Pages.

A quick way to edit the current landing page is by replacing the word "show" in the URL by "edit".
e.g. /civicrm/landingpage/edit?id=5&reset=1


