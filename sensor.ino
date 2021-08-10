
#include "DHT.h"  //
#define DHTPIN D6     // pin yang terconnect dalam dht 11 yaitu D6
#define DHTTYPE DHT11   // DHT 11
 
int sensor_pin = A0;
int value ; 
DHT dht(DHTPIN, DHTTYPE);
int trigPin = D8;    // Trigger
int echoPin = D7;    // Echo
long duration, cm, inches; 
void setup() 
{
  Serial.begin(115200);
  Serial.println("DHT11 test!");
  dht.begin();
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  
}
 
void loop() 
{
  //sensor cahaya
  int sensorValue = analogRead(sensor_pin);
  Serial.println("Intesitas Cahaya:");
  Serial.println(sensorValue);
  delay(1000);
  
  digitalWrite(trigPin, LOW);
  delayMicroseconds(5);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  pinMode(echoPin, INPUT);
  duration = pulseIn(echoPin, HIGH);
 
  // Convert the time into a distance
  cm = (duration/2) / 29.1;     // Divide by 29.1 or multiply by 0.0343
  inches = (duration/2) / 74;   // Divide by 74 or multiply by 0.0135
  
  Serial.print(inches);
  Serial.print("Jarak dalam in, ");
  Serial.print(cm);
  Serial.print("Jarak dalam cm");
  Serial.println();
  // Wait a few seconds between measurements.
  delay(2000);

  
 //untuk sesor dht 11
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);
 
  //Periksa apakah ada pembacaan yang gagal dan keluar lebih awal (untuk mencoba lagi).
  if (isnan(h) || isnan(t) || isnan(f)) 
  {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }
 
  //menampilkan hasil pembacaan sensor
  Serial.print("Kelembapan: ");
  Serial.print(h);
  Serial.print(" %\t");
  Serial.print("Temperatur: ");
  Serial.print(t);
  Serial.print(" *C ");
  Serial.print(f);
  Serial.println(" *F");
 
}
