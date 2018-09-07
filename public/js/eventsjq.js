$(document).ready(function (){

   $('.btn-like-article').on('click', function (e) {
        e.preventDefault();
        var $link = $(e.currentTarget)
        $link.toggleClass('far').toggleClass('fas');
   });

});