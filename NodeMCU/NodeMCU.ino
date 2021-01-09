#include <NTPClient.h>
#include <WiFiUdp.h>
#include <ESP8266WiFi.h>
#include <time.h>
#include <SoftwareSerial.h>
#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>     
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <Wire.h>


#define SS_PIN D4
#define RST_PIN D2
#define LED 2
#define buzzer D8


MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance.

/* Set these to your desired credentials. */
const char *ssid = "DIGI-01067235";  //ENTER YOUR WIFI SETTINGS
const char *parola = "yaBd99tA";

 

//int httpCode;
String postData;
String UIDresult;


WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org");
//Week Days
String weekDays[7]={"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"};

//Month names
String months[12]={"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"};

void setup() {
  pinMode(buzzer,OUTPUT);
  Wire.begin(2,0);             

  
  delay(1000);
  Serial.begin(115200);
  Serial1.begin(115200);
  SPI.begin();      //--> Init SPI bus
  mfrc522.PCD_Init(); //--> Init MFRC522 card

  delay(500);

  WiFi.begin(ssid, parola); //--> Connect to your WiFi router
  Serial.println("");
    
  pinMode(LED,OUTPUT); 
  digitalWrite(LED, HIGH); //--> Turn off Led On Board

  //----------------------------------------Wait for connection
  
//  Serial.print("Conectare la reteaua WiFi");
  while (WiFi.status() != WL_CONNECTED) {
//    Serial.print(".");
    //----------------------------------------Make the On Board Flashing LED on the process of connecting to the wifi router.
    digitalWrite(LED, LOW);
    delay(250);
    digitalWrite(LED, HIGH);
    delay(250);
  }
  
  digitalWrite(LED, HIGH);//--> Turn off the On Board LED when it is connected to the wifi router.
  //----------------------------------------If successfully connected to the wifi router, the IP Address that will be visited is displayed in the serial monitor
  tone(buzzer, 4000, 100); 
  

  
//  Serial.println("");
//  Serial.print("Conectat la reteaua WiFi : ");
//  Serial.println(ssid);
//  Serial.print("Adresa IP : ");
//  Serial.println(WiFi.localIP());
//  Serial.println("Apropiati cartela pentru citire ");
//  Serial.println("");

  timeClient.begin();
  // Set offset time in seconds to adjust for your timezone, for example:
  // GMT +1 = 3600
  // GMT +8 = 28800
  // GMT -1 = -3600
  // GMT 0 = 0
  timeClient.setTimeOffset(10800);
}

void loop() {
  if (POST_GET()) {
    timp();
  }
 return;
}


   int getid(){
  //look for new card
   if ( ! mfrc522.PICC_IsNewCardPresent()) {
  return 0;  // daca nu a fost gasita nicio cartela, sari la inceputul buclei
 }
 
 if ( ! mfrc522.PICC_ReadCardSerial()) {
  return 0;  //daca read card serial(0) returneaza 1, atunci s-a gasit UID-ul
 }

// Serial.print("ID-ul cartelei scanate este : ");

 for (byte i = 0; i < mfrc522.uid.size; i++) {
     UIDresult += mfrc522.uid.uidByte[i]; //stocarea UID-ului in string
}
mfrc522.PICC_HaltA(); //oprirea citirii
  return 1;
}

int POST_GET() {
  if(getid()) {  
  digitalWrite(LED, LOW);
  HTTPClient http;    //Declare object of class HTTPClient
  
  //POST Data
    postData = "UIDresult=" + UIDresult;  
  
  
    http.begin("http://192.168.1.4/iot_cloud/getUID.php");  //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
  
    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
  
//  Serial.println(UIDresult);
//  Serial.println(httpCode);   //Print HTTP return code
//  Serial.println(payload);    //Print request response payload
  if(httpCode == 200){
  tone(buzzer, 4000, 250);
  
 
  UIDresult = "";
  postData = "";
  
  http.end();  //Close connection
  delay(1000);
  digitalWrite(LED, HIGH);
  
  
  delay(2000); //Delay delimitare requesturi

   HTTPClient http;    //Declare object of class HTTPClient
   http.begin("http://192.168.1.4/iot_cloud/null.php");  //Specify request destination
   int httpCode = http.GET();                                                                  
   String payload = http.getString();   //Get the request response payload
   
  Serial.print(payload);
  Serial1.print(payload);
  http.end();   //Close connection
  delay(1000);
  digitalWrite(LED, HIGH);
  Serial.print(" ");
  Serial1.print(" ");
  timp();
  if (payload == "Cartela invalida") {
     
     tone(buzzer, 4000);       
     delay(1500);  
     noTone(buzzer);
     
  }
  else {
    tone(buzzer, 4000);
     delay(100);  
     noTone(buzzer);
     delay(100);
     tone(buzzer, 4000);       
     delay(100);  
     noTone(buzzer);
     
  }
  
  }
  
}
}


int timp () {
  timeClient.update();

  unsigned long epochTime = timeClient.getEpochTime();
  String formattedTime = timeClient.getFormattedTime();
  
  Serial.print(formattedTime);
  Serial1.println(formattedTime);
  Serial.print(" ");
  Serial1.print(" ");
    
  //Crearea unei structuri de timp
  struct tm *ptm = gmtime ((time_t *)&epochTime); 

  int monthDay = ptm->tm_mday;
  int currentMonth = ptm->tm_mon+1;

  String currentMonthName = months[currentMonth-1];

  int currentYear = ptm->tm_year+1900;
  
  //Afisarea datei complete
  String currentDate = String(monthDay) + "-" + String(currentMonth) + "-" + String(currentYear);

  Serial.println(currentDate);
  Serial1.println(currentDate);

}
