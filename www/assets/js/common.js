
var currentProject = {};

var allProjects = {};

$('#body').fa({
	viewPathUrl: '/views/',
	enableHashUrl: true,
	debug: () => {
		$(document).find('.loader').show();
		setTimeout(()=>{
			$(document).find('.loader').hide();
		}, 1000);
	},
	controllers: {

		MainController:{
			actionIndex:{
				view: 'main',
				execute: ($state, $object) => {
					$(document).find('.menu-item-a').removeClass('active')
					$(document).find('.sf').addClass('active');

					function getUrlVars(){
					    var vars = [], hash;
					    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
					    for(var i = 0; i < hashes.length; i++)
					    {
					        hash = hashes[i].split('=');
					        vars.push(hash[0]);
					        vars[hash[0]] = hash[1];
					    }
					    return vars;
					}

					var filter = {
						start: 0,
						length: 50
					};
					responce(filter);

					$(document).on('click', '.filter-by-year .menu-item a', event => {
						event.preventDefault();
						$('.loops-wrapper').html("");
						var year = $(this).attr('href');
						var semester = ['Spring', 'Fall', 'Summer'];
						for (var i = 0; i < semester.length; i++)
							responce('semester='+semester[i]+'%20'+year);

					});


					$object.toProject = ($state, $el) => {
						if (allProjects.results) {
							var nameProject = explode('#', $el.attr('href'))[3];
							$.each(allProjects.results, (index, val) => {
								if(val.name == nameProject){
									currentProject[nameProject] = val;
									localStorage.setItem(val.name, JSON.stringify(val));
									$state.redirect = $el.attr('href');
								}
							});
						}
					}


					function responce(filter, cleared){

						$.ajax({
							url: 'http://libraries-archive.cca.edu/dmba/',
							type: 'GET',
							dataType: 'JSON',
							data: filter,
							async: false,
							success: res => {
								allProjects = res;
								var template = '<article>'
												+'<figure class="post-image ">'
											        +'<a href="" fa-click="toProject()" class="to-view" ><img src="http://www.sak-info.ru/templates/coolmini/images/no-images.jpg" alt="Calen Russell Barca-Hall" width="350" height="250"></a>'
											    +'</figure>'
											   +' <div class="post-content">'
											        +'<h1 class="post-title entry-title" itemprop="name"><a href="http://gradthesis.cca.edu/calen-russell-barca-hall/" title="Calen Russell Barca-Hall">Video final</a></h1>'
											        +'<p class="post-meta entry-meta">'
											            +'<span class="post-author"><span class="author vcard" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><a class="url fn n" href="http://gradthesis.cca.edu/author/admin/" rel="author" itemprop="name">admin</a></span></span>'
											            +'<span class="post-category"><a href="http://gradthesis.cca.edu/category/finearts/" title="View all posts in Fine Arts" rel="category tag">Financial &amp; Managerial Acct</a></span>'
											        +'</p>'
											        +'<div class="entry-content" itemprop="articleBody">'
											        +'</div>'
											    +'</div>'
											    +'</article>';
								if (!$.isEmptyObject(res.results)) {
									$.each(res.results, (index, val) => {
										var img = 'http://www.sak-info.ru/templates/coolmini/images/no-images.jpg';
										if (val.attachments.length){
											var preImg = [];
											$.each(val.attachments, (index, attach) => {
												if (attach.filename.indexOf('png') >= 0 || attach.filename.indexOf('jpg') >= 0 || attach.filename.indexOf('jpeg') >= 0 ) {
													preImg[index] = attach.links.thumbnail;
												}
											});
											if (preImg.length) {
												img = preImg[0];
											}
										}
										var html =  $(template).find('.post-category a')
																.text(val.course)
																.closest('article')
																.find('.post-title a')
																.text(val.faculty)
																.closest('article')
																.find('img')
																.attr('src', img)
																.closest('article')
																.find('.to-view')
																.attr('href', '#view#name#'+val.name)
																.closest('article')
																.html();

										 $('.loops-wrapper').prepend( '<article class="clone-article post type-post status-publish format-standard has-post-thumbnail hentry category-finearts post clearfix cat-3">'+html+'</article>' );
									});
								}

							}
						});
					}

					return [$state, $object];
				}
			}
		},

		Design_strategyController: {
			actionIndex:{
				view: 'design_strategy',
				execute: ($state, $object) => {
					$(document).find('.menu-item-a').removeClass('active')
					$(document).find('.ds').addClass('active');
					return [$state, $object];
				}
			}
		},

		ViewController:{
			actionName:{
				view: 'project-view',
				execute: ($state, $object) => {
					var name = explode('#', window.location.hash)[3];
					if (name && currentProject[name]) {

						draw(currentProject[name]);

					}else{
						if (name && localStorage.getItem(name) )
							draw( JSON.parse(localStorage.getItem(name)) );
						else
							$state.redirect = '/';
					}

					function draw($data){
						$(document).find('.post-content .post-title a').text($data.name);
						$(document).find('.entry-content').html('').append('<p>'+$data.description+'</p>').prepend('<h3>'+$data.faculty+'</h3');
					}

					return [$state, $object];
				}
			}
		}

	}

});

function explode( delimiter, string ) {

    var emptyArray = { 0: '' };

    if ( arguments.length != 2|| typeof arguments[0] == 'undefined'|| typeof arguments[1] == 'undefined' )
        return null;

    if ( delimiter === ''|| delimiter === false|| delimiter === null )
        return false;

    if ( typeof delimiter == 'function'|| typeof delimiter == 'object'|| typeof string == 'function'|| typeof string == 'object' )
        return emptyArray;

    if ( delimiter === true )
        delimiter = '1';

    return string.toString().split ( delimiter.toString() );
};
