
$(document).ready(function () {

  // sprawdzanie każdej zmiany pola wyboru
  document.getElementById('selectedType').addEventListener('change', function() {
    var selectedValue = this.value,
        post = document.getElementById('post'),
        get = document.getElementById('get'),
        borders = document.getElementById('borders'),
        logg = document.getElementById('logg'),
        logp = document.getElementById('logp'),
        player = document.getElementById('player');

        
      logp.style.display = 'none';
      logg.style.display = 'none';
      player.style.top = '132.5px';
      player.style.left = '5px;';


    if(selectedValue === 'GET'){
      get.style.display = 'block';
      post.style.display = 'none';
      borders.style.display = 'none';
      buttong.style.display = 'block';
    } else if(selectedValue === 'POST'){
      get.style.display = 'none';
      post.style.display = 'block';
      borders.style.display = 'none';
      buttonp.style.display = 'block';
    } else {
      console.log('none');
      get.style.display = 'none';
      post.style.display = 'none';
      borders.style.display = 'none';
    }
  });
  let buttong = document.getElementById('buttong'),
      buttonp = document.getElementById('buttonp');
  buttong.addEventListener("click", function() {
      document.getElementById('borders').style.display = 'block';
      buttong.style.display = 'none';
  })
  buttonp.addEventListener("click", function() {
    document.getElementById('borders').style.display = 'block';
    buttonp.style.display = 'none';
})
});
