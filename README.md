# SGTH CodeIgniter
Saidu Group of Teaching Hospitals, Swat by using CodeIgniter v4

Tasks:

Backend:

Done: 
Authentication
    Login
    Register new users
    Update user information
    Change Password
    Unique Filename, File title

// Done but commented
News Upload
    Compress files before uploading

To do:




News Page (admin)
    edit news published to archive, not Delete
    edit news title, content, published date




News Page (public)

Display 
    news
        news title, content, published_date
    files
        filenames, dates, filesizes, type, previews, downloads, preview and download buttons

Pagination

Search files


News Section

Additional things to do:
Add 2 Factor Authentication
Add Captcha
Add login information (MAC Addresses, time, location, etc.)


Edit News
    Display editable news
    Edit news published to archive, not Delete
    Edit news title, content, published date


_____________________________________________________________________________


Frontend:

Template
    Think later


_____________________________________________________________________________


----------------------------------------
Troubleshooting & Fix Logs
----------------------------------------
- Error: "Class 'CodeIgniter\Database\MySQLi\Connection' not found"
  Fix:
    - Run chkdsk
    - Delete vendor/
    - composer clear-cache
    - composer install
    - php spark cache:clear

_____________________________________________________________________________
