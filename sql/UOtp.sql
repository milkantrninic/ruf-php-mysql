CREATE TABLE UOtp (
   BRFAK CHAR(6), 
   DATFAK DATETIME, 
   KUPAC CHAR(5), 
   NAZKUP CHAR(30), 
   NAZKUPPLUS CHAR(30), 
   PTTKUP CHAR(5), 
   MESKUP CHAR(20), 
   ULKUP CHAR(30), 
   ULKUPPLUS CHAR(30), 
   PIBKUP CHAR(13), 
   JIBKUP CHAR(13), 
   DATPRO DATETIME, 
   DATVAL DATETIME, 
   AVANS DECIMAL(15,3), 
   ZAPLA DECIMAL(15,3), 
   BROTP CHAR(6), 
   BRFI INTEGER, 
   PREDAO CHAR(30), 
   PRIMIO CHAR(30), 
   PRIMIO_LK CHAR(20), 
   OPISPOROSL CHAR(200), 
   NAPOMENA1 CHAR(60), 
   NAPOMENA2 CHAR(60), 
   NAPOMENA3 CHAR(60), 
   NAPOMENA4 CHAR(60), 
   KLAUZULA BLOB);

INSERT INTO UOtp
  (BRFAK, DATFAK, KUPAC, NAZKUP, NAZKUPPLUS, PTTKUP, MESKUP, ULKUP, ULKUPPLUS, PIBKUP, JIBKUP, DATPRO, DATVAL, AVANS, ZAPLA, BROTP, BRFI, PREDAO, PRIMIO, PRIMIO_LK, OPISPOROSL, NAPOMENA1, NAPOMENA2, NAPOMENA3, NAPOMENA4, KLAUZULA)
VALUES
  ("000070", "22/6/2018", "00064", "Koming - Pro d.o.o.", "", "", "78400 Gradi�ka", "Vidovdanska bb", "", "401039530006", "0", "22/6/2018", "22/6/2018", 0, 150, "", 0, "", "", "", "", "", "", "", "", "
");
INSERT INTO UOtp
  (BRFAK, DATFAK, KUPAC, NAZKUP, NAZKUPPLUS, PTTKUP, MESKUP, ULKUP, ULKUPPLUS, PIBKUP, JIBKUP, DATPRO, DATVAL, AVANS, ZAPLA, BROTP, BRFI, PREDAO, PRIMIO, PRIMIO_LK, OPISPOROSL, NAPOMENA1, NAPOMENA2, NAPOMENA3, NAPOMENA4, KLAUZULA)
VALUES
  ("000071", "16/8/2018", "00007", "Poljorad d.o.o.", "", "", "72 283 Turbe - Travn", "Bosanska bb", "", "236121190000", "0", "16/8/2018", "16/8/2018", 0, 600, "", 0, "", "", "", "", "", "", "", "", "
");
INSERT INTO UOtp
  (BRFAK, DATFAK, KUPAC, NAZKUP, NAZKUPPLUS, PTTKUP, MESKUP, ULKUP, ULKUPPLUS, PIBKUP, JIBKUP, DATPRO, DATVAL, AVANS, ZAPLA, BROTP, BRFI, PREDAO, PRIMIO, PRIMIO_LK, OPISPOROSL, NAPOMENA1, NAPOMENA2, NAPOMENA3, NAPOMENA4, KLAUZULA)
VALUES
  ("000072", "26/9/2018", "00099", "STRABAG AG Podr. Sarajevo", "", "", "71 000 Sarajevo", "Zmaja od Bosne br.: 11", "", "4800000810003", "0", "26/9/2018", "26/9/2018", 0, 0, "", 0, "", "", "", "", "POVRAT SA SERVISA AGREGATA sa dizel motorom YANMAR L-100 , D", "EFEKTA�A bez POPRAVKE .", "", "", "Adresa isporuke fakture:

SunFana Dolina 2
Crkvice kod broja 48
72000 Zenica

");

COMMIT;

