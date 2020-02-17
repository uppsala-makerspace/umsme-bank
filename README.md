# Bankintegration för UMSME

Detta projekt tillhandahåller en proxy för att läsa ut transaktioner från Swedbanks innofficiella REST API för mobilappen. Koden är en tunn wrapper runt 
[SwedbankJSON projektet](https://github.com/walle89/SwedbankJson).

Orsaken till att detta projekt behövs är för att ge en förenklad REST tjänst till [medlemsadministrationssystemet för Uppsala Makerspace -UMSME](https://github.com/uppsala-makerspace/umsme). UMSME är en Meteor applikation och kan inte integrera direkt med SwedbankJSON då det är ett PHP projekt.

## Installation och setup
Först, se till att du har php installerat. Därefter ska du köra `install.sh` scriptet, det kommer att göra följande:

1. Installera composer
2. Använda composer för att installera SwedbankJSON

## Kör igång bankintegrationen
I moderna versioner av php finns en inbyggd webbserver som man sätter igång med:

    php -S localhost:8000

Du kan också använda kommandot `run.sh` som gör precis det.

## Använda bankintegrationen

För att testa kan du gå till:

    http://localhost:8000/check.php

Du bör få json tillbaka med status `uninitiated`. För att sätta igång authentiseringen kör du:

    http://localhost:8000/initiate.php?pnr=ditt_pers_nr

Därefter bör du få upp en authentisering i din bankid app. Efter att du bekräftat kan du besöka `check.php` igen och se att du nu har får en status som säger `ready`.

Nu kan du läsa ut transaktioner på ditt konto genom att gå till:

    http://localhost:8000/transactions.php

## Varför inte prata med Swedbanks REST API direkt från JavaScript
Efter ett antal misslyckade försök har detta angreppsätt bedömts som för tidskrävande. Det är också en fråga om att hålla sådan kod uppdaterad då Swedbanks API ändras. Detta undviks genom att förlita sig på SwedbankJson projektet som redan har ett antal aktiva användare / utvecklare.