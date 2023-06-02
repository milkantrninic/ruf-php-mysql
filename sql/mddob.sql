CREATE TABLE MdDob (
   SIFRA CHAR(5), 
   NAZIV CHAR(30), 
   NAZIVPLUS CHAR(30), 
   ULICA CHAR(30), 
   ULICAPLUS CHAR(30), 
   PTT CHAR(5), 
   MESTO CHAR(20), 
   ZIRO CHAR(20), 
   PIB CHAR(13), 
   PEPDV CHAR(13), 
   TEL CHAR(30), 
   KONTAKT CHAR(30), 
   KD CHAR(20), 
   RABAT DECIMAL(5,2), 
   MEMO BLOB);

INSERT INTO MdDob
  (SIFRA, NAZIV, NAZIVPLUS, ULICA, ULICAPLUS, PTT, MESTO, ZIRO, PIB, PEPDV, TEL, KONTAKT, KD, RABAT, MEMO)
VALUES
  ("1", "InfoCom", "", "Srpska 15", "", "", "Banja Luka", "123", "1", "120", "Igor", "", "", 0, "");
INSERT INTO MdDob
  (SIFRA, NAZIV, NAZIVPLUS, ULICA, ULICAPLUS, PTT, MESTO, ZIRO, PIB, PEPDV, TEL, KONTAKT, KD, RABAT, MEMO)
VALUES
  ("2", "Automilovanovic", "", "Kralja Petra I Kar", "", "", "Banja Luka", "", "0", "0", "Milan", "", "", 0, "");

COMMIT;

