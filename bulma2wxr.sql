-- Author: Joan Miquel Torres Rigo  <joanmi@bulma.net>

set names utf8;
set session group_concat_max_len = 2758654;

update bul_tbl_tipos_noticia set nombre_tipo_noticia = 'Manoletada' where nombre_tipo_noticia like 'Manoletada %';



-- Header:/*{{{*/
select 
'<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
	xmlns:excerpt="http://wordpress.org/export/1.0/excerpt/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:wp="http://wordpress.org/export/1.0/"
>

<channel>
	<title>Bulma</title>
	<link>http://www.bulma.net</link>
	<description>Bergantells Usuaris de GNU/Linux de Mallorca i Afegitons</description>
	<pubDate>Fri, 07 Jan 2011 18:38:59 +0000</pubDate>
	<generator>http://wordpress.org/?v=3.0.4</generator>
	<language>es</language>
	<wp:wxr_version>1.0</wp:wxr_version>
	<wp:base_site_url>http://www.bulma.net</wp:base_site_url>
	<wp:base_blog_url>http://www.bulma.net</wp:base_blog_url>
' as ' ';/*}}}*/




-- Categories:
select
concat(
'<wp:category>
	<wp:category_nicename>', lower (nombre_tipo_noticia), '</wp:category_nicename>
	<wp:category_parent></wp:category_parent>
	<wp:cat_name><![CDATA[', nombre_tipo_noticia, ']]></wp:cat_name>
	<wp:category_description><![CDATA[', descripcion_tipo_noticia, ']]></wp:category_description>
</wp:category>'
) as " "
from bul_tbl_tipos_noticia
;

-- Noticia:
select
concat(
-- {{{
'<item>
	<title>', titulo_noticia, '</title>
	<link>http://www.bulma.net/?p=', id_noticia, '</link>
	<pubDate>', fecha_alta_noticia, '</pubDate>
	<dc:creator><![CDATA[', (
		select email_autor from bul_tbl_autores where id_autor = bul_tbl_noticias.id_autor
	), ']]></dc:creator>

	<category><![CDATA[', (
		select nombre_tipo_noticia from bul_tbl_tipos_noticia
		where id_tipo_noticia = bul_tbl_noticias.id_tipo_noticia
	 ), ']]></category>
	<category domain="category" nicename="uncategorized"><![CDATA[', (
		select lower (nombre_tipo_noticia) from bul_tbl_tipos_noticia
		where id_tipo_noticia = bul_tbl_noticias.id_tipo_noticia
	), ']]></category>
	<wp:tag>
		<wp:tag_slug>', 'test', '</wp:tag_slug>
		<wp:tag_name>', 'test', '</wp:tag_name>
	</wp:tag>

	<guid isPermaLink="false">http://www.bulma.net/?p=', id_noticia, '</guid>

	<description></description>
	<content:encoded><![CDATA[<!--start_raw-->', 
	(
		select group_concat(cuerpo_noticia separator '<!--nextpage-->') from bul_tbl_cuerpo_noticias
		where id_noticia = bul_tbl_noticias.id_noticia
		order by numero_pagina
	), '<!--end_raw-->]]></content:encoded>
	<excerpt:encoded><![CDATA[', resumen_noticia, ']]></excerpt:encoded>
	<wp:post_id>', id_noticia, '</wp:post_id>
	<wp:post_date>', fecha_alta_noticia, '</wp:post_date>
	<wp:post_date_gmt>', fecha_alta_noticia, '</wp:post_date_gmt>
	<wp:comment_status>open</wp:comment_status>
	<wp:ping_status>open</wp:ping_status>
	<wp:post_name></wp:post_name>
	<wp:status>publish</wp:status>
	<wp:post_parent>0</wp:post_parent>
	<wp:menu_order>0</wp:menu_order>
	<wp:post_type>post</wp:post_type>
	<wp:post_password></wp:post_password>
	<wp:is_sticky>0</wp:is_sticky>

', (
		select group_concat(
			'
	<wp:comment>
		<wp:comment_id>', id_comentario, '</wp:comment_id>
		<wp:comment_author><![CDATA[', nombre_comentador, ']]></wp:comment_author>
		<wp:comment_author_email>', email_comentador, '</wp:comment_author_email>
		<wp:comment_author_url><![CDATA[', web_comentador, ']]</wp:comment_author_url>
		<wp:comment_author_IP>', coalesce ('', key_comentario), '</wp:comment_author_IP>
		<wp:comment_date>', fechahora_comentario, '</wp:comment_date>
		<wp:comment_date_gmt>', fechahora_comentario, '</wp:comment_date_gmt>
		<wp:comment_content><![CDATA[', cuerpo_comentario, ']]></wp:comment_content>

		<wp:comment_approved>0</wp:comment_approved>
		<wp:comment_type></wp:comment_type>
		<wp:comment_parent>', coalesce (id_contesta, 0), '</wp:comment_parent>
		<wp:comment_user_id>', coalesce (0, (
		  -- Optimization :-P
			select id_autor from bul_tbl_autores
			where lower (email_autor) = lower (email_comentador)
		), '0'), '</wp:comment_user_id>
	</wp:comment>
'
			separator ''
		) from bul_tbl_comentarios
		where id_noticia = bul_tbl_noticias.id_noticia
		order by id_comentario
	),

'</item>
'
-- }}}
) as " "
from bul_tbl_noticias
order by id_noticia desc
limit 50
;



-- Footer:
select 
'</channel>
</rss>
' as " ";

-- -- Deleteme:
-- ----select replace (cuerpo_noticia, '&gt;', '>') from bul_tbl_cuerpo_noticias where numero_pagina = 4 limit 1;
















