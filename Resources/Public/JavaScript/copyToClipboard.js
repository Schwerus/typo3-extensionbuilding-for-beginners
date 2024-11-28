// JavaScript-Funktion zum Kopieren von Inhalten in die Zwischenablage
function copyToClipboard(elementId) {
    // Element per ID abrufen
    var element = document.getElementById(elementId);
    if (element) {
        // Inhalt des Elements als Text speichern
        var textToCopy = element.innerText || element.textContent;

        // Temporäres Textfeld erstellen
        var tempInput = document.createElement("textarea");
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);

        // Inhalt in die Zwischenablage kopieren
        tempInput.select();
        document.execCommand("copy");

        // Temporäres Textfeld wieder entfernen
        document.body.removeChild(tempInput);

        // Optional: Erfolgsmeldung anzeigen
        alert("Inhalt in die Zwischenablage kopiert!");
    }
}

// JavaScript-Funktion zum Umschalten der Sichtbarkeit der Kopieren-Buttons
function toggleCopyButtons() {
    var buttons = document.querySelectorAll('.copyshow');
    buttons.forEach(function(button) {
        if (button.style.display === 'none') {
            button.style.display = 'inline-block';
        } else {
            button.style.display = 'none';
        }
    });
}
