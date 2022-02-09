# PHP-NodeMCU-RFID-Attendance-logging-system
-The system is based on a website created with PHP,HTML,CSS, Bootstrap, Javascript, jQuery, a NodeMCU and an Arduino UNO board (for the hardware device), and a MySQL database.

-The hardware device will read RFID cards, store their information, and send it to the website which will process the data and then modify it/store it in the SQL database, then send a response to the device so it can print a message on an LCD screen and also write the result on a micro SD card.

-The website allows the administrator to register, delete and even edit users and their registered RFID cards. The system displays the current registered attendance, logged on the final page in a table obtained by inner joining the 'users' and the 'logs' table, using MySQL queries. This final table can also be exported as an Excel file.

<h2>Project diagram</h2>
<img src="Preview/bloc.jpg">
<h2>Website diagram</h2>
<img src="Preview/site.jpg">
<h2>User data</h2>
<img src="Preview/studenti.JPG">
<h2>User data edit page</h2>
<img src="Preview/edit.JPG">
<h2>User data delete page</h2>
<img src="Preview/delete.JPG">
<h2>Registration</h2>
<img src="Preview/inregistrare.JPG">
<h2>Read tag</h2>
<img src="Preview/date cartela.JPG">
<img src="Preview/date.JPG">
<h2>Attendance logs</h2>
<img src="Preview/prezenta.JPG">
<h2>Attendance logs exported as an Excel file</h2>
<img src="Preview/excel.JPG">
<h2>The logic behind the hardware device</h2>
<img src="Preview/hardware flowchart.JPG">
<h2>The hardware device</h2>
<img src="Preview/device outside.jpg">
<img src="Preview/device inside.jpg">
