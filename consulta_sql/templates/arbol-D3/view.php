<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>
<?php  if (!empty($field_1_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>
<?php
$db = Loader::db();
$sql=nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET));
$filas = $db->Execute($sql);
?>



TABLAD3:<div id="arbol_resultado"></div>

<div id="arbol_ordenado"></div>


<div class="content">
  <h1>Responsive Organization Chart</h1>
<figure class="org-chart cf">
</figure>
</div>
<script type="text/javascript">
$( document ).ready(function() {

		var sqlquery = [<?php  
			    foreach ($filas as $fila) {             
			        echo '{"id": '.$fila['id'].', "parentid": '.$fila['id_padre'].', "name": "'.utf8_decode($fila['te_nombre']).'"},' . PHP_EOL;            
			    }
			?>];
		var resultado;
		resultado = _queryTreeSort({q: sqlquery});
//		$('#arbol_resultado').html(JSON.stringify(sqlquery, true, 2));

		var treeBD;
		treeBD = _makeTree({q: resultado});

		var html_arbol = _renderTree(treeBD);
//		$('#arbol_ordenado').html(JSON.stringify(treeBD, true, 2));

		var margin = {top: 20, right: 120, bottom: 20, left: 120},
		    width = 1360 - margin.right - margin.left,
		    height = 1200 - margin.top - margin.bottom;
		    
		var i = 0,
		    duration = 750,
		    root;

		var tree = d3.layout.tree()
		    .size([height, width]);

		var diagonal = d3.svg.diagonal()
		    .projection(function(d) { return [d.x, d.y]; });

		var svg = d3.select(".org-chart").append("svg")
		    .attr("width", width + margin.right + margin.left)
		    .attr("height", height + margin.top + margin.bottom)
		  	.append("g")
		    .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
		    ;

		var flare = treeBD[0];

		root = flare;
		root.x0 = height / 2;
		root.y0 = 0;

		function update(source) {

		  // Compute the new tree layout.
		  var nodes = tree.nodes(root).reverse(),
		      links = tree.links(nodes);

		  // Normalize for fixed-depth.
		  nodes.forEach(function(d) { d.y = d.depth * 80; });

		  // Update the nodes…
		  var node = svg.selectAll("g.node")
		      .data(nodes, function(d) { return d.id || (d.id = ++i); });

		  // Enter any new nodes at the parent's previous position.
		  var nodeEnter = node.enter().append("g")
		      .attr("class", "node")
		      .attr("transform", function(d) { return "translate(" + source.x0 + "," + source.y0 + ")"; })
		      .on("click", click)
		      .on("mouseover", mouseover)
		      .on("mouseout", mouseout);

		  nodeEnter.append("circle")
		      .attr("r", 1e-6)
		      .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

		  nodeEnter.append("text")
		      .attr("y", function(d) { return d.children || d._children ? -10 : 100; })
		      .attr("dx", function(d) { return 2*d.name.length})
		      .attr("text-anchor", function(d) { return d.children || d._children ? "end" : "start"; })
		      .text(function(d) { return d.name; })
		      .style("fill-opacity", 1e-6);

		  // Transition nodes to their new position.
		  var nodeUpdate = node.transition()
		      .duration(duration)
		      .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

		  nodeUpdate.select("circle")
		      .attr("r", 4.5)
		      .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

		  nodeUpdate.select("text")
		      .style("fill-opacity", 1);

		  // Transition exiting nodes to the parent's new position.
		  var nodeExit = node.exit().transition()
		      .duration(duration)
		      .attr("transform", function(d) { return "translate(" + source.x + "," + source.y + ")"; })
		      .remove();

		  nodeExit.select("circle")
		      .attr("r", 1e-6);

		  nodeExit.select("text")
		      .style("fill-opacity", 1e-6);

		  // Update the links…
		  var link = svg.selectAll("path.link")
		      .data(links, function(d) { return d.target.id; });

		  // Enter any new links at the parent's previous position.
		  link.enter().insert("path", "g")
		      .attr("class", "link")
		      .attr("d", function(d) {
		        var o = {x: source.x0, y: source.y0};
		        return diagonal({source: o, target: o});
		      });

		  // Transition links to their new position.
		  link.transition()
		      .duration(duration)
		      .attr("d", diagonal);

		  // Transition exiting nodes to the parent's new position.
		  link.exit().transition()
		      .duration(duration)
		      .attr("d", function(d) {
		        var o = {x: source.x, y: source.y};
		        return diagonal({source: o, target: o});
		      })
		      .remove();

		  // Stash the old positions for transition.
		  nodes.forEach(function(d) {
		    d.x0 = d.x;
		    d.y0 = d.y;
		  });
		}

		// Toggle children on click.
		function click(d) {
		  if (d.children) {
		    d._children = d.children;
		    d.children = null;
		  } else {
		    d.children = d._children;
		    d._children = null;
		  }
		  update(d);
		}

		function mouseover(d) {
		    d3.select(this).append("text")
		        .attr("class", "hover")
		        .attr('transform', function(d){ 
		            return 'translate(5, -10)';
		        })
		        .text(d.name + ": " + d.id);
		}

		// Toggle children on click.
		function mouseout(d) {
		    d3.select(this).select("text.hover").remove();
		}

		function collapse(d) {
		  if (d.children) {
		    d._children = d.children;
		    d._children.forEach(collapse);
		    d.children = null;
		  }
		}

		function toggleAll(d) {
		    if (d.children) {
		      d.children.forEach(toggleAll);
		      toggle(d);
		    }
		}

		  // Initialize the display to show a few nodes.
//		root.children.forEach(toggleAll);

		root.children.forEach(collapse);
		update(root);

		d3.select(self.frameElement).style("height", "600px");

});
</script>