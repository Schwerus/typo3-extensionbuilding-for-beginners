@echo off
:: Speichert den aktuellen Verzeichnisbaum in einer .txt-Datei
set OUTPUT_FILE=verzeichnisbaum.txt

:: Erstelle den Verzeichnisbaum und speichere ihn in der Datei
tree /F /A > %OUTPUT_FILE%

:: Nachricht für den Benutzer
echo Der Verzeichnisbaum wurde in %OUTPUT_FILE% gespeichert.
