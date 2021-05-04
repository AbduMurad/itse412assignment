# This is a college assignment - ITSE412

It was to test how we can manipulate data in files and folders using php

## Requirements

### Create Files

- A php file to write all the code necessary to render the html page and access neighbouring files (named index.php instead of assignment.php for convenience).
- Two text files one to read from and the other to write in.
- Style file for styling, duh!
- And an images folder.

### Steps to solve what was required

#### 1st Requirement (Create a header and a paragraph)

- Using fopen function so we could read from file.
- The function fgets gets us the first line to display it as a header Then it moves the file indicator to the next line so we can grab the next paragraph easily.
- fread function will read the rest of the paragraph.

### 2nd Requirement (Display Images)

- First grab all images names from images folder using scandir.
- Then iterate over the images names and create for each name an html img element to assign that name in that element src attribute.
- To create an appropriate value for the title and alt tag you can combine the use of strpos and substr where you could use strpos to find where the dot is (the dot before the extension) then use the substr to cut the name to that position.

### 3rd Requirement (List all file names normally)

- The function scandir is used to get all file names then you iterate over that array to list all file names

### 4th Requirement (List all file names without the extension)

- Well, here you gotta combire what you did in the last 2nd and 3rd requirements.

### 5th Requirement (List all files sorted)

- The function scandir already sorts this for you alphabetically.

### 6th Requirement (List all images and make them clickable)

- Grab images names and assign it to href attribute of an anchor html element.

### 7th Requirement (List the png image name you have)

- Grab file names then substr the extension and use it in a condition checking if the extension is in a (png, PNG) format.

Thanks! hope you learned something 🤞
