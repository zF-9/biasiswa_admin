var events = [
  {'Date': new Date(2020, 0, 7), 
  	'Title': 'Doctor appointment at 3:25pm.'},
  {'Date': new Date(2020, 0, 18), 
  	'Title': 'New Garfield movie comes out!', 
  	'Link': 'https://garfield.com'},
  {'Date': new Date(2020, 0, 27), 
  	'Title': '25 year anniversary', 
  	'Link': '/datatable_pemohon'},
];
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
