<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
  	
    <title>Betterstack Test Application</title>
    
	<link href="favicon.ico" type="image/x-icon" rel="icon" />
	<link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />	
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/application.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    
    <script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
	  <script type="text/javascript" charset="utf-8" src="js/bootstrap.min.js"></script>
   

  </head> 
  <body>

  <div class="container">
    
    <?= $content ?>
    
  </div>  

  </body>

  <footer>
    <div class="container d-flex justify-content-center">
      <div class="toast" id="updateToast" style="position: fixed; bottom: 20px; right: 20px; max-width: 90%; width: auto;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header d-flex justify-content-between">
          <strong class="me-auto">Latest Update:</strong>
          <small class="text-body-secondary" id="timeago"></small>
        </div>
        <div class="toast-body" id="commitMessage">
          Loading latest commit message...
        </div>
      </div>
    </div>
  </footer>

  <script>
  $(document).ready(function() {
    setTimeout(function() {
      fetch('https://api.github.com/repos/GusGusGusGus/betterstack/commits/main')
        .then(response => {
          console.log('Response status:', response.status);
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          
          if (data && data.commit && data.commit.message) {
            const commitMessage = data.commit.message;
            const shortSha = data.sha.substring(0, 7);

            const commitDate = new Date(data.commit.author.date);
            const now = new Date();
            const timeElapsed = Math.floor((now - commitDate) / 1000);

            let timeAgo;
            if (timeElapsed < 60) {
              timeAgo = `${timeElapsed} seconds ago`;
            } else if (timeElapsed < 3600) {
              timeAgo = `${Math.floor(timeElapsed / 60)} minutes ago`;
            } else if (timeElapsed < 86400) {
              timeAgo = `${Math.floor(timeElapsed / 3600)} hours ago`;
            } else {
              timeAgo = `${Math.floor(timeElapsed / 86400)} days ago`;
            }

            $('#commitMessage').html(`<small><strong><span class="commit-grey">Commit #</span><a href="https://github.com/GusGusGusGus/betterstack/commit/${data.sha}" target="_blank">${shortSha}</a>:</strong> ${commitMessage.toLowerCase()} <a href="https://github.com/GusGusGusGus/betterstack" target="_blank" style="margin-left: 10px;">view repo</a></small>`);
            $('#timeago').html(timeAgo);
           
          } else {
            throw new Error('Commit message not found in the response');
          }
        })
        .catch(error => {
          console.error('Error fetching commit message:', error);
          $('#commitMessage').html('<small> Failed to load commit message. <a href="https://github.com/GusGusGusGus/betterstack" target="_blank" style="margin-left: 10px;">view repo</a></small>');
          $('#timeago').html('');

        });
    }, 100); // Delay of 100 milliseconds
  });
</script>

</html>