<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
   <xsl:template match = "/">   	
<html>
<body>
	

	<img style="height:100px;
    border-radius: 50%;">
    <xsl:attribute name="src">
					<xsl:value-of select="sitemap/image/source"/>
					</xsl:attribute>
				</img>
<div style="width:300px border-bottom:2px solid grey">
	<h1 style="position: absolute;
    color: black;
    transform: translate(570px,-100px);" align="center">Meeting Room Sitemap</h1><br/><br/>

<div style="
	display:grid;
    margin:0;
    width:100%;
    height:60px;
    font-size:20px;
    color:white;
    grid-template-columns:1fr 1fr 1fr 1fr;
    background-color: #333;
">
<!-- <xsl:for-each select="sitemap/navbar"> -->
<a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation1/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation1"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation2/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation2"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation3/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation3"/></a>
    
 <!-- </xsl:for-each> -->
</div>
<!-- </div> -->
<br/><br/>

	
	<table align="center" style="border-none">
		<tr>
			<th style="width:300px; font-size:25px;">Help And FAQ</th>
			<th style="width:300px; font-size:25px;">Login</th>
			<th style="width:300px; font-size:25px;">Find a Meeting Room</th>
		</tr>
		<br/><br/>

		<!-- <xsl:template match="row">
		<xsl:apply-templates select="col1"/>
	<xsl:apply-templates select="col2"/>
		

		</xsl:template>

		

			<xsl:template match="col2">
		<p style="font-family:Times New Roman"><xsl:value-of select="."/>
		</xsl:template> -->
<!-- <xsl:template match="row">
<xsl:template match="col1">
		<p style="font-family:Open Sans"><xsl:value-of select="."/>
		</xsl:template>
		</xsl:template> -->
<!-- <xsl:template match="sitemap"> -->
		<xsl:for-each select="sitemap/row">
		<xsl:sort select="col1"/>
				<tr>
					
					<td style="padding:10px;font-size:20px;" align="center">
					
				<!-- <xsl:variable name="link">
<xsl:value-of select="link1"/>
</xsl:variable> -->
					<!-- <xsl:value-of select="col1"/> -->
					<!-- <a href="{@link}.html"><xsl:apply-templates select="col1"/></a> -->
					<a>
					<xsl:attribute name="href">
					<xsl:value-of select="col1/@link"/>
					</xsl:attribute>
					<xsl:apply-templates select="col1"/></a>
				
					
					</td>

					<!-- <xsl:variable name="link">
					<xsl:value-of select="link2"/>
					</xsl:variable> -->
					<td style="padding:10px;font-size:20px;" align="center">
						
						<a>
						<xsl:attribute name="href">
					<xsl:value-of select="col2/@link"/>
					</xsl:attribute>
							<xsl:apply-templates select="col2"/></a>
					
				</td>
					<td  style="padding:10px;font-size:20px;" align="center">
						<a>
						<xsl:attribute name="href">
					<xsl:value-of select="col3/@link"/>
					</xsl:attribute>
						<xsl:value-of select="col3"/></a>
					
					</td>
					<br/>
					
				</tr>
			</xsl:for-each>
			<!-- </xsl:template> -->
	</table>

</div>
</body>
</html>
</xsl:template>
	<xsl:template match="col1">
		<p style="font-family:Open Sans"><xsl:value-of select="."/></p>
		</xsl:template>

		<xsl:template match="col2">
		<p style="font-style:italic"><xsl:value-of select="."/></p>
		</xsl:template>
</xsl:stylesheet>


