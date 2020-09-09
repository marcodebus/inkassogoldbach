import mysql.connector
from mysql.connector import errorcode

# Obtain connection string information from the portal
config = {
  'host':'debus.xyz',
  'user':'d0338536',
  'password':'InkassoGoldbach',
  'database':'d0338536'
}



# Construct connection string
try:
   conn = mysql.connector.connect(**config)
   print("Connection established")
except mysql.connector.Error as err:
  if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    print("Something is wrong with the user name or password")
  elif err.errno == errorcode.ER_BAD_DB_ERROR:
    print("Database does not exist")
  else:
    print(err)
else:
  cursor = conn.cursor()

  # Read data
  cursor.execute("SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0)) FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte;")
  rows = cursor.fetchall()
  print(cursor.rowcount," Datensätze gesamt")

  # Print all rows
  for row in rows:
    string1 = str(row[0]).encode('ascii', 'ignore').decode('ascii')
    string2 =str(row[1]).encode('ascii', errors='strict').decode('ascii')
    string3 = str(row[2]).encode('ascii', 'ignore').decode('ascii')
    print (string1 + " | " + string2 + " | " + string3)

  #
  conn.commit()
  cursor.close()
  conn.close()
  print("Done.")
