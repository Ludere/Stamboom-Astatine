$(function(){ // on dom ready

var cy = cytoscape({
  container: document.getElementById('cy'),
  
  style: cytoscape.stylesheet()
    .selector('node')
      .css({
        'background-color': '#ff9900',
        'content': 'data(name)'
      })
    .selector('edge')
      .css({
        'target-arrow-shape': 'triangle',
        'width': 4,
        'line-color': '#ddd',
        'target-arrow-color': '#ddd'
      })
    ,
  
  elements: {
      nodes: [
        { data: { id: 'Directus Calvatus', name:'Test' } },
        { data: { id: 'Jorn' } },
        { data: { id: 'Sylvio' } },
        { data: { id: 'Sublime' } },
        { data: { id: 'Terzja' } },
        { data: { id: 'Teun' } },
        { data: { id: 'Martijn' } },
        { data: { id: 'Matthias' } },
        { data: { id: 'Matthias2' } },
        { data: { id: 'Matthias3' } },
        { data: { id: 'Matthias33' } },
        { data: { id: 'Matthia2s3' } },
        { data: { id: 'Matthias3' } },{ data: { id: 'Matthi4as3' } },{ data: { id: 'Matth5ias3' } },{ data: { id: 'Matthia3s3' } },{ data: { id: 'Matt3hias3' } },{ data: { id: 'Matthi4as3' } },{ data: { id: 'Ma3tthias3' } },{ data: { id: 'Matth2ias3' } },{ data: { id: 'Matthias3' } },{ data: { id: 'Matt3hias3' } },
      ], 
      
      edges: [
        { data: { id: 'ae', source: 'Directus Calvatus', target: 'Jorn' } },
        { data: { id: 'ab', source: 'Directus Calvatus', target: 'Sylvio' } },
        { data: { id: 'be', source: 'Directus Calvatus', target: 'Terzja' } },
        { data: { id: 'bc', source: 'Jorn', target: 'Sublime' } },
        { data: { id: 'ce', source: 'Sylvio', target: 'Sublime' } },
        { data: { id: 'cd', source: 'Sublime', target: 'Teun' } },
        { data: { id: 'de', source: 'Sublime', target: 'Matthias' } },
        { data: { id: 'df', source: 'Sublime', target: 'Martijn' } }
      ]
    },
  
  layout: {
    name: 'cose',
    directed: true,
    padding: 10
  }
});
  


}); // on dom ready