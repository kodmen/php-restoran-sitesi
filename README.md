# php kullanarak restorant sitesi

### php kullanarak restorant sitesine randevi kayıt yapabiliyorsunuz ve randevu saatiniz size mail yolu ile iletiliyor. içerisindeki form ekranında doğrulamalar çalışıyor ve doğrulamaları javascript kullanarak yaptım email gönderme işlemini formu doldurunca gönder deyince ajax kullanarak sayfa yenilenmeden gönderilmekte eğer gönderirse size gönderildi diye mesaj bilgisi vermektidir. Siteyi mobil uyumyu hale getirdim ve formun içine gerekli iconları ekledim.




![form ekranı](https://github.com/kodmen/php-suhi-site/blob/master/readme-image/image-1.png)


## İçinde kullanılan diller ve framework

- php
- js
- ajax
- alertify.js
- html
- css





## Kullanılan tablo 
-- <br/>
-- Veritabanı: `suhi-rest` <br/>
-- -------------------------------------------------------- <br>
-- Tablo için tablo yapısı `bookhere`<br>

CREATE TABLE `bookhere` (<br>
  `id` int(11) NOT NULL,<br>
  `people` varchar(250) NOT NULL,<br>
  `tarih` varchar(250) NOT NULL,<br>
  `saat` varchar(250) NOT NULL,<br>
  `username` varchar(250) NOT NULL,<br>
  `email` varchar(250) NOT NULL,<br>
  `phone` varchar(250) NOT NULL<br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8;<br>

