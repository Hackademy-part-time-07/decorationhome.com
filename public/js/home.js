var canvasDots = function() {
  var sectionSelector = '.centerSection';
  var section = document.querySelector(sectionSelector);

  if (section) {
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');
    var colorDot = '#CECECE';
    var color = '#CECECE';

    canvas.width = section.offsetWidth;
    canvas.height = section.offsetHeight;
    canvas.style.display = 'block';
    canvas.classList.add('connecting-dots');
    section.appendChild(canvas);

    ctx.fillStyle = colorDot;
    ctx.lineWidth = 0.1;
    ctx.strokeStyle = color;

    var mousePosition = {
      x: 30 * canvas.width / 100,
      y: 30 * canvas.height / 100
    };

    var dots = {
      nb: 600,
      distance: 60,
      d_radius: 100,
      array: []
    };

    function Dot(){
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;

      this.vx = -0.5 + Math.random();
      this.vy = -0.5 + Math.random();

      this.radius = Math.random();
    }

    Dot.prototype = {
      create: function(){
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        ctx.fill();
      },

      animate: function(){
        for(var i = 0; i < dots.nb; i++){
          var dot = dots.array[i];

          if(dot.y < 0 || dot.y > canvas.height){
            dot.vx = dot.vx;
            dot.vy = -dot.vy;
          }
          else if(dot.x < 0 || dot.x > canvas.width){
            dot.vx = -dot.vx;
            dot.vy = dot.vy;
          }
          dot.x += dot.vx;
          dot.y += dot.vy;
        }
      },

      line: function(){
        for(var i = 0; i < dots.nb; i++){
          for(var j = 0; j < dots.nb; j++){
            var i_dot = dots.array[i];
            var j_dot = dots.array[j];

            if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > -dots.distance && (i_dot.y - j_dot.y) > -dots.distance){
              if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > -dots.d_radius && (i_dot.y - mousePosition.y) > -dots.d_radius){
                ctx.beginPath();
                ctx.moveTo(i_dot.x, i_dot.y);
                ctx.lineTo(j_dot.x, j_dot.y);
                ctx.stroke();
                ctx.closePath();
              }
            }
          }
        }
      }
    };

    function createDots(){
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      for(var i = 0; i < dots.nb; i++){
        dots.array.push(new Dot());
        var dot = dots.array[i];
        dot.create();
      }
      dot.line();
      dot.animate();
    }

    section.onmouseenter = function(parameter) {
      setInterval(createDots, 1000/30);
    };

    section.onmousemove = function(parameter) {
      mousePosition.x = parameter.pageX - section.offsetLeft;
      mousePosition.y = parameter.pageY - section.offsetTop;
    };

    section.onmouseleave = function(parameter) {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      dots.array = [];
    };

    mousePosition.x = section.offsetWidth / 2;
    mousePosition.y = section.offsetHeight / 2;
  }
};

window.addEventListener('DOMContentLoaded', canvasDots);
