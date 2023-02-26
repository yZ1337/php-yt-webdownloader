
# PHP/Python YouTube web application downloader

Simple YouTube video downloader written in PHP, HTML and Python.

Created by: [oVeXz](https://github.com/oVeXz)

This page will show you how to install and use the program.



## Documentation

Python dependencies needed:

- [Pytube](https://github.com/pytube/pytube)

For more information on Pytube and how to use it. Click the link.

## Installation

1. Install Pytube, copy code below and paste in terminal:
```
python3 -m pip install pytube
```

2. Import the SQL database from [here](https://github.com/oVeXz/php-yt-webdownloader/blob/main/sql/youtube-downloader.sql).
The colomns of the table:  
| id  | video_name | video_link | video_id |

3. Clone this github respo to your server.
```
git clone https://github.com/oVeXz/php-yt-webdownloader.git
```
4. After this make sure to edit the [connect.php](https://github.com/oVeXz/php-yt-webdownloader/blob/main/connect.php) file on the following line:
```
$con = new PDO('mysql:host=localhost;dbname=youtube-downloader', 'USERNAME', 'PASSWORD');
```
Change the USERNAME and PASSWORD to your login credentials of your database.

5. After this the installation should be finished!

## Additional installation ()

When using this web application on a Linux based server, make sure to give permission to execute the Python script.
Skip this part if you are not using Linux or have this already set!

To do this:

1. Add yourself to the www-data group:
```
usermod -a -G www-data (your-username)
```
2. Change the ownership of the folder:
```
chown -R www-data:(your-username) path/to/php-yt-webdownloader/scripts
```
3. Change the group of the file.
```
cd path/to/php-yt-webdownloader/scripts
chgrp www-data ytdownload.py
```
4. Finally give permission to the file to be executed.
```
chmod -R g+rx ytdownload.py
```
g+rx: g=group, r=reabale and x=execute

## Screenshots

  Screenshot without download button:
![Main screen](https://github.com/oVeXz/php-yt-webdownloader/blob/main/screenshots/1.png)
  
  Screenshot with download button:
![Screen with download button](https://github.com/oVeXz/php-yt-webdownloader/blob/main/screenshots/2.png)


## To Do List:

- [ ]  Make automatic .mp4 file deletion in the Downloads folder, after a period of time.
- [ ]  Make it work for .mp3.
- [ ]  Get the IP from the downloader and UPDATE this into the database.
- [ ]  Get the time of when the video is downloaded and UPDATE this into the database.


## Developers and maintainers

- [@oVeXz](https://github.com/oVeXz)
