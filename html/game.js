// Gra, cały kod


// Kiedy dokument jest gotowy, wykonywana jest funkcja
$(document).ready(function(){
    // zmień true na czas kiedy jest okej do wykonania :DD
    if(function(){var borders = getElementById('borders');if (borders.css('display')=='block'){return true;}}){
            // Definiowanie wszystkich elementów
            var borders = $('#borders'),
                player = $('#player'),
                enemy1 = $('#enemy1'),
                enemy2 = $('#enemy2'),
                enemy3 = $('#enemy3'),
                enemy4 = $('#enemy4'),
                enemy5 = $('#enemy5'),
                enemy6 = $('#enemy6')
                finish = $('#finish'),
                death = 0;
                wh = borders.width() - player.width(),
                wv = borders.height() - player.height(),
                keys = {},
            // Prędkość gracza
                speed = 3;
                
            // Funkcja do dostawania pozycji elementu
            function position(a){
                var top = parseFloat(a.css('top')),
                    bottom = top + parseFloat(a.css('height')),
                    left = parseFloat(a.css('left')),
                    right = left + parseFloat(a.css('width')),
                    position = {t: $(top) , b: $(bottom) , l: $(left) , r: $(right)};
                return position;
            }
            
            // Funkcja sprawdzająca kolizje dwóch elementów
            function isCollision(ele1 , ele2){
                return (
                (parseFloat(position(ele1).t[0]) < parseFloat(position(ele2).b[0]) && parseFloat(position(ele1).t[0]) > parseFloat(position(ele2).t[0]))
                ||
                (parseFloat(position(ele1).b[0]) < parseFloat(position(ele2).b[0]) && parseFloat(position(ele1).b[0]) > parseFloat(position(ele2).t[0]))
                )
                &&
                (
                (parseFloat(position(ele1).l[0]) < parseFloat(position(ele2).r[0]) && parseFloat(position(ele1).l[0]) > parseFloat(position(ele2).l[0]))
                ||
                (parseFloat(position(ele1).r[0]) < parseFloat(position(ele2).r[0]) && parseFloat(position(ele1).r[0]) > parseFloat(position(ele2).l[0]))
                )
            }


                // Funkcja obliczająca nową horyzontalną pozycje
            function newHorizontal(v,a,b) {
                var n = parseInt(v, 10) - (keys[a] ? speed : 0) + (keys[b] ? speed : 0);
                return n < 0 ? 0 : n > wh ? wh : n;
            }

            // Funkcja obliczająca nową wertykalną pozycje
            function newVertical(v,a,b) {
                var n = parseInt(v, 10) - (keys[a] ? speed : 0) + (keys[b] ? speed : 0);
                return n < 0 ? 0 : n > wv ? wv : n;
            }   

            // Sprawdzanie czy klawisz jest wciśnięty
            $(window).keydown(function(e) { keys[e.which] = true; });
            $(window).keyup(function(e) { keys[e.which] = false; });

            // stałe wykonywanie funkcji co 20ms
            setInterval(function(){
                // Zmienianie pozycji gracza według wciśniętego klawisza
                player.css({
                    left: function(i,v) { return newHorizontal(v, 37, 39); },
                    top: function(i,v) { return newVertical(v, 38, 40); }
                });

                // Sprawdzanie czy gracz dotyka pola wyjścia

                if(isCollision(finish , player)){
                    borders.css("display","none");
                    if (document.getElementById('selectedType').value === 'GET'){
                        document.getElementById('logg').style.display = "block";
                    } else if (document.getElementById('selectedType').value === "POST"){
                        document.getElementById('logp').style.display = "block";
                    }
                   
                }
                
                
                // Sprawdzanie kolizji z każdym przeciwnikiem pokolei
                if(isCollision(enemy1 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }else if(isCollision(enemy2 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }else if(isCollision(enemy3 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }else if(isCollision(enemy4 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }else if(isCollision(enemy5 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }else if(isCollision(enemy6 , player)){
                    death++;
                    player.css({top: 260, left: 5});
                }
                // Aktualizacja licznika śmierci
                document.getElementById('deathCounter').innerHTML = "liczba śmierci: " + death;
            }, 20);




    }
});
