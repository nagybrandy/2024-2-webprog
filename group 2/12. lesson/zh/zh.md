# Évfolyam zh

## Tudnivalók

- A zárthelyi megoldására **210 perc** áll rendelkezésre, amely **magába foglalja** a kezdőcsomagban található `README.hun.md` fájl kitöltésére, a feladatok elolvasására, az anyagok letöltésére, összecsomagolására és feltöltésére szánt időt is.
- A feladatokat a Canvas rendszeren keresztül kell beadni. **A rendszer pontban 19:00-kor lezár, ezután nincs lehetőség beadásra**.
- A feladatok megoldásához a Canvasbe előre feltöltött segédanyagok használhatók, illetve a ZH mód mellett engedélyezett [JavaScript](https://developer.mozilla.org/en-US/) és [PHP dokumentáció](https://www.php.net/). **A zárthelyi időtartamában emberi segítség** (szinkron, aszinkron, chat, fórum, stb) **és mesterséges intelligencia** (ChatGPT, Bing AI, GitHub Copilot, stb.) **igénybe vétele tilos!** Ezek elfogadásáról nyilatkoztok a kezdőcsomagban található `README.hun.md` fájlban, amelyben egyben tudomásul is veszitek az esetleges következményeket.
- A feladatok nem épülnek egymásra, **tetszőleges sorrendben** megoldhatók.
- A feladatok megoldásához először [töltsd le az általunk készített keretprogramot](???). Ebben minden feladat külön könyvtárban helyezkedik el. Minden könyvtárban előkészítettük a HTML, CSS, JavaScript, PHP állományokat. Ezekben dolgozz! A kliensoldali feladatokban általában csak a `.js` fájlhoz kell hozzányúlni, de ha kell, akkor a HTML is módosítható, sőt több `.js` fájlra is szétoszthatod a megoldásodat, de ez egyáltalán nem elvárás.
- A letöltött keretprogramban lévő `README.hun.md` fájlban töltsétek ki a nevetek és a Neptun azonosítótokat (a <> jeleket nem kell beleírni)! **A megfelelően kitöltött `README.hun.md` állomány nélküli megoldásokat nem értékeljük!**
- Minden feladat könyvtárában találsz egy `TASKS.md` fájlt. Ezekben az egyes `[ ]` közötti szóközt cseréld le `x`-re azoknál a részfeladatoknál, amiket sikerült (akár részben) megoldanod! Ez segít nekünk abban, hogy miket kell néznünk az értékeléshez.
- A PHP telepítéséhez töltsd le és futtasd a [`PhpComposerInstaller.exe`](???) fájlt!

## JavaScript feladatok

### 1. Szelvények (js-1-tickets, 10 pont)

Az ötöslottón 1-től 90-ig terjedő számok közül kell eltalálni a kihúzott öt számból minél többet. A kiinduló HTML dokumentumba már beágyazott `data.js` állomány egy `tickets` tömböt definiál, amelyben lottószelvényeken megjátszott számok találhatók. Nézd meg az adatszerkezetet, majd oldd meg ezen tömb felhasználásával **programozottan** az alábbi feladatokat! _(Segítség: a mellékelt képről leolvashatók a helyes válaszok.)_ Mivel a dokumentumban a `data.js` script után az `index.js` is beágyazásra került, így az utóbbiban minden különösebb gond nélkül használható az előbbiben található tömb, ahogyan ezt a beírt `console.log()` is bizonyítja.

- a. (1 pont) A `task1` azonosítójú elembe írd ki, hogy hány szelvény van összesen!
- b. (2 pont) A `task2` azonosítójú elembe írd ki, hogy hány olyan szelvény van, amin megjátszották a 42-es számot!
- c. (2 pont) A `task3` azonosítójú elembe írj ki egy olyan szelvényt, amin nem szerepel 20-nál nagyobb szám! (Feltételezhető, hogy létezik legalább egy ilyen szelvény.)
- d. (2 pont) A `task4` azonosítójú elembe írd ki, hogy mi az összes megjátszott szám átlaga!
- e. (3 pont) A `task5` azonosítójú elembe írd ki azt a számot, amelyet a legtöbbször játszottak meg!


### 2. Sorsolás (js-2-draw, 12 pont)

Minden szombat este emberek millióit szegezi a TV-képernyő elé a lottósorsolás. Sokan izgatottan figyelik, hogy melyik színes golyó fog kiemelkedni az üvegbúra alól. A feladatod most egy sorsoló gömb animációjának elkészítése JavaScript canvas technológia segítségével!

- a. (1 pont) A sorsoláshoz használt üvegbúra oldalnézetből kör alakú. Rajzold ki a `bowl` objektum által leírt középponttal és sugárral ezt a kört az animációs ciklusban!
- b. (1 pont) Az üvegbúra kitöltése legyen kissé átlátszó szürke, körvonala pedig az alapbeállításnál vastagabb és fekete színű!
- c. (1 pont) A `ball` objektum egyetlen számgolyót ír le. Rajzold ki a `ball` objektumban léírt golyót egy sárga körként!
- d. (1 pont) Írd bele a kirajzolt golyóba az objektum `id` tulajdonságában tárolt számot is! (Az egyszerűség kedvéért a számot nem szükséges elforgatni a golyó mozgása közben.)
- e. (2 pont) Mozgasd a golyót x és y irányban az objektumban tárolt egyenletes `vx` és `vy` sebességgel!
- f. (2 pont) A `circleCollision` függvény (paramétere a golyó és a gömb objektuma) használatával ellenőrizd, hogy a mozgó golyó ütközik-e belülről a gömb falával! Amennyiben ütközést tapasztalsz, akkor hívd meg a `calculateReflection` függvényt (paramétere a golyó objektuma), és módosítsd a golyó `vx, vy` sebességét a függvény által visszaadott objektumból kiolvasható értékekre! Helyes megoldás esetén a golyó szabályosan fog visszaverődni a kör széléről.
- g. (2 pont) Oldd meg, hogy ne csak egyetlen golyó legyen, hanem a `balls` tömb összes golyója megfelelően mozogjon és rajzolódjon ki!
- h. (2 pont) Az oldal megnyitásakor töltsd fel a `balls` tömböt 90 golyóval, amelyek `id` tulajdonsága 1-től 90-ig terjed! A golyók kezdő helyzetét állítsd be véletlenszerűen a búrán belül, illetve adj nekik véletlenszerű kezdősebességet is! Véletlenszám-generáláshoz használhatod a kezdőcsomagban adott `random` függvényt.


### 3. Pénzosztás (js-3-money, 14 pont)

Ebben a feladatban szét kell osztani a pénzt a nyertesek között. Az egyes bankjegyekre kattintva növelni lehet a kifizetendő összeget, majd a megfelelő gombbal átutalható az összeg a kiválaszott nyertesnek. Az emberek adatait a `data.js` állomány "beégetve" tartalmazza. Mivel a dokumentumban a `data.js` script után az `index.js` is beágyazásra került, így az utóbbiban minden különösebb gond nélkül használható az előbbiben található tömb, ahogyan ezt a beírt `console.log()` is bizonyítja.

- a. (1 pont) A bankjegyekre kattintáskor növeld meg az `amount` azonosítójú `span` elemben lévő aktuális értéket a kattintott kép `data-value` attribútumában található számmal!
- b. (2 pont) Az előző (a.) feladatot delegálás használatával oldd meg, vagyis ne regisztrálj minden képhez külön eseménykezelőt!
- c. (2 pont) Az oldal betöltésekor generálj egy táblázatot a `people` objektumban található emberekről a kezdőcsomagban adott mintát követve! Minden emberhez egy-egy **oszlop** tartozik.
- d. (2 pont) Töltsd fel az üres legördülő listát az emberek neveivel!
- e. (2 pont) A gombra kattintáskor növeld meg a kiválasztott ember részére kifizetett összeget (`paid`) az `amount` azonosítójú elemben található összeggel, majd állítsd nullára az `amount`-ban lévő értéket!
- f. (2 pont) Amennyiben a kifizetett nyeremény valakinél nagyobb, mint az adott ember számára kifizetendő összeg (`to_pay`), alkalmazd a kifizetett összeget jelző cellára az `overpaid` stílusosztályt!
- g. (2 pont) Oldd meg, hogy egy ember képére kattintva az adott ember legyen kiválasztva a legördülő listában!
- h. (1 pont) Az előző (g.) feladatot delegálás használatával oldd meg, vagyis ne regisztrálj minden képhez külön eseménykezelőt!


## PHP feladatok

### 4. Statisztika (php-4-stats, 12 pont)

Ebben a feladatban rendelkezésedre állnak a `data.php` állományban az elmúlt tíz év ötöslottó-sorsolásainak adatai: a sorsolás dátuma, a kihúzott nyerőszámok, illetve az, hogy az egyes találatokból (2, 3, 4 és 5 találatért fizetnek) hány darab volt a húzáson, és ezekért mekkora összeget fizettek. Amennyiben valamelyik fajta találatból nem volt az adott sorosoláson, ott összegként 0 Ft szerepel. _(Segítség: a számítási feladatok hatékony megoldásához célszerű, de nem kötelező a PHP tömbfüggvényeit használni, mint pl. `array_filter`, `array_map`, `array_sum`, stb.)_

- a. (2 pont) Generálj táblázatot a `$data` asszociatív tömbben található adatokból a minta szerinti oszlopokkal!
- b. (2 pont) Amennyiben valamelyik nyereményből nem volt az adott sorsoláson, akkor a `0 (0 Ft)` felirat helyett jeleníts meg `---` szöveget! (Tipp: itt érdemes lehet egy újrafelhasználható megoldást pl. függvénybe szervezni, hiszen több oszlopban is használnod kell majd.)
- c. (2 pont) Oldd meg, hogy a sorsolás dátuma a tárolt `YYYY-mm-dd` formátum helyett magyaros `YYYY.mm.dd.` formátumban jelenjen meg! (Tehát cseréld le a kötőjeleket pontra, illetve a dátum végére is kerüljön pont!)
- d. (1 pont) Ha volt az adott sorsoláson öttalálatos szelvény, akkor alkalmazd a `jackpot` stílusosztályt a sorsolást leíró sorra!
- e. (2 pont) A táblázat utolsó sorába add össze, hogy az egyes találatokból összesen hány darab volt! (Az első két oszlopot összevonhatod és/vagy üresen hagyhatod.)
- f. (3 pont) Az oldal tetején található helyre jelenítsd meg **programozottan**, hogy melyik dátumon volt a legutóbb öttalálatos szelvény! (A feladat megoldása során szükség esetén kihasználhatod, hogy az adott tömb eleve dátum szerint rendezett.)


### 5. Regisztráció (php-5-registration, 12 pont)

Hoppá! Nyertél a lottón! Azonban mielőtt megkaphatnád a nyereményedet, regisztrálnod kell magadat a személyes adataid megadásával. Ebben a feladatban el kell készítened a nyeremény igényléséhez szükséges űrlapot ellenőrző PHP scriptet.

- a. (2 pont) A teljes név, e-mail cím, születési év és bankszámlaszám mezők mindegyikének kitöltése kötelező.
- b. (1 pont) A teljes név legalább 2 szóból áll.
- c. (1 pont) Az e-mail formátuma helyes.
- d. (1 pont) A születési év egész szám.
- e. (1 pont) A születési év 1900 és 2006 közötti.
- f. (1 pont) A bankszámlaszám pontosan 26 karakterből áll.
- g. (3 pont) A bankszámlaszám 9. és 18. karaktere kötőjel (`-`), az összes többi karaktere 0-9 számjegy. (pl. `12345678-00000000-12345678`)
- h. (1 pont) A jelölőmező bejelölése kötelező.
- i. (1 pont) Sikeres validáció esetén jelenjen meg a `success` elem, az `errors` elem pedig legyen rejtett.


### 6. Napló (php-6-log, 12 pont)

Sokan felteszik maguknak a kérdést, hogy egyáltalán megéri-e szerencsejátékozni hosszútávon. Ebben a feladatban egy olyan szerveroldali alakalmazást kell elkészítened, amelyben naplózhatjuk a kiadásainkat és bevételünket az egyes sorsolásokon. **Nem kell ellenőrizned az űrlap helyességét!** Az adatokat el kell tárolnod JSON formátumban, és onnan ki kell tudnod olvasni.

- a. (3 pont) Az oldal tetején található űrlapon legyen lehetőség új rekordot létrehozni a naplóba, amelyben a sorsolás dátumát és az adott sorsolásra vonatkozó pénzmozgást tároljuk. (A negatív szám jelentse azt, hogy azon a napon veszteséges volt játszani.)
- b. (3 pont) Oldd meg, hogy amennyiben olyan napra szeretnénk új rekordot rögzíteni, amely már szerepel a naplóban; akkor ne új rekord kerüljön be, hanem módosuljon az előző úgy, hogy a beírt és az eddigi összes lesz a napi pénzmozgás értéke.
- c. (2 pont) Az űrlap alá listázd ki a fájlban található napokat és pénzösszegeket a minta szerinti formátumban!
- d. (2 pont) A listaelem melletti linkre kattintva legyen lehetőség törölni az adott napot a naplóból!
- e. (2 pont) Oldd meg, hogy a listaelemek akkor is dátum szerint rendezve jelenjenek meg, ha nem ilyen sorrendben rögzítettük őket!
