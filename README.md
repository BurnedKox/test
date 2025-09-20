# Carelius Ubezpieczenia – motyw WordPress

Ten repozytorium zawiera kompletny motyw WordPress przygotowany dla firmy Carelius Ubezpieczenia. Motyw został zaprojektowany pod kątem czytelnej prezentacji oferty, referencji klientów oraz łatwego kontaktu z doradcą.

## Instalacja
1. Sklonuj repozytorium do katalogu `wp-content/themes` Twojej instalacji WordPress.
2. W panelu administratora WordPress przejdź do **Wygląd → Motywy** i aktywuj motyw „Carelius Ubezpieczenia”.
3. W sekcji **Wygląd → Personalizuj** uzupełnij dane kontaktowe, które będą wyświetlane w sekcji kontaktowej i w stopce.
4. Dodaj wpisy do typów treści **Oferty** oraz **Referencje**, aby wypełnić sekcje na stronie głównej i w archiwach.
5. (Opcjonalnie) W katalogu **Wygląd → Widgety** uzupełnij kolumny stopki oraz panel boczny.

## Funkcjonalności
- Dedykowana strona główna z sekcją hero, ofertą, referencjami i wezwaniem do działania.
- Dwa niestandardowe typy wpisów: **Oferty** i **Referencje**, z dodatkowymi polami podkreślającymi korzyści i stanowiska autorów opinii.
- Szablony archiwów i widoków pojedynczych wpisów dostosowane do treści Carelius (oferty w formie kart oraz rozbudowane referencje).
- Responsywny wygląd z menu mobilnym, nawigacją w stopce i rozbudowanym stylem edytora blokowego.
- Personalizowane dane kontaktowe dostępne w Customizerze – numer telefonu, adres e-mail, adres biura oraz tekst CTA.
- Przygotowane style dla panelu blokowego w edytorze i niestandardowe palety kolorów/fonów w edytorze bloków.

## Dodatkowe pola (Custom Fields)
Motyw rejestruje pola meta edytowalne w edytorze blokowym:

### Oferty (`post_type: oferta`)
- `carelius_oferta_highlight` – krótki wyróżnik oferty wyświetlany w kartach i nagłówkach.

### Referencje (`post_type: referencja`)
- `carelius_referencja_position` – stanowisko lub rola autora opinii.
- `carelius_referencja_rating` – ocena w skali 1–5 przedstawiana jako gwiazdki.

## Rozwój
- Zmiany w plikach PHP warto sprawdzić poleceniem `find wp-content/themes/carelius -name "*.php" -print0 | xargs -0 -n1 php -l`.
- Style główne znajdują się w `wp-content/themes/carelius/style.css`, a style edytora blokowego w `wp-content/themes/carelius/assets/css/editor-style.css`.
- Skrypt odpowiedzialny za obsługę menu mobilnego znajduje się w `wp-content/themes/carelius/assets/js/main.js`.

## Licencja
Motyw jest dostępny na licencji [GPL-2.0-or-later](https://www.gnu.org/licenses/gpl-2.0.html).
