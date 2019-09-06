(function (window , document) {
	
	spa.getId('view').router()
		.route('/','views/home.html', null, function(){
			setParallax(".welcome p");
		})
		.route('/gallery','views/gallery.html', null, function(){
			createProducts("js/info.json",'products',template);
		})
		.route('/blog', 'views/blog.html', 'blog', function(){
			//spa.getCurrentControl().loadPost();
			createProducts("js/data.json",'blog',template_blog);
		});

})(window,document);




// Generating content based on the template
var template = "<div class='prod'>\n\
					<div class='con1'>\n\
					<h3>INFO</h3>\n\
						<img class='image' src='img/placeholder.png' data-src='SLUG' alt='NAME'>\n\
					</div>\n\
				</div>";

var template_blog = "<div class='post'>\n\
					<h3 class='title'>NAME</h3>\n\
					<img src='img/placeholder.png' data-src='SLUG' alt='NAME'>\n\
					<p>INFO</p>\n\
				</div>";


function createProducts(db,el,tem){
	let content = '';

	let href = window.location.origin + window.location.pathname;
	fetch(href+db).then(function(response) {
		return response.json();
	  })
	  .then(function(response){
		createProduct(response,tem);
	  })
	  .then(function(){
		document.getElementById(el).innerHTML = content;
		console.log('datos creados');
		
		render();
	  });

	  async function createProduct(data,template) {
		await data.forEach(el => {

			var entry =  template.replace(/SLUG/g,el.img)
			.replace(/NAME/g,el.name)
			.replace(/INFO/g,el.datos);
			
			content += entry;
			console.log(content);
		});
		
	}

}

function render(){
	var imagesToLoad = document.querySelectorAll('img[data-src]');
	var loadImages = function(image) {
		image.setAttribute('src', image.getAttribute('data-src'));
		image.onload = function() {
			image.removeAttribute('data-src');
		};
	};
	console.log(imagesToLoad);

	if('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function(items, observer) {
			items.forEach(function(item) { 
				if(item.isIntersecting) {
					loadImages(item.target);
					observer.unobserve(item.target);
				}
			});
		});
		imagesToLoad.forEach(function(img) {
			observer.observe(img); 
		});
	}
	else {
		imagesToLoad.forEach(function(img) {
			loadImages(img);
		});
	}

}

function setParallax(element){

	window.addEventListener("scroll",()=>{
		
		var scrollval= window.pageYOffset;
		let elWithParallax = document.querySelector(element);
		if (isInPage(elWithParallax)) {
			elWithParallax.style.transform="translateY(-"+scrollval/0.8+"%)";
		}
	});
};

function isInPage(node){
	return (node === document.body) ? false : document.body.contains(node);
};
