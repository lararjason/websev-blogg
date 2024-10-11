# Webbserver 2024-24
## Uppgift: Blogg

Här finns koden som jag väljer att dela med mig.
Du behöver
- Lägga koden i en mapp
- Ställa in xampp att se "public_html" som server rooten
- importera databasen i phpmyadmin
- skapa en användare för databasen (om du inte har en global -> %)
- skapa en .env filen för din databas och användare.

#### .env filen:
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

### Vad vi gjort på lektionerna (som syns i koden):
- Läsa från db
- Skriva till db
- Router
- Fragmenterat koden till views, och templates
- Funktioner för unika URLer och att hantera bilder

### Vad du ska göra härnäst
- Fixa en /edit route där du kan ta bort blogg inlägg
- Fixa en /edit/{post-namn} där du kan uppdatera en post

