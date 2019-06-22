<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-container">
	<div class="mdui-row">
		<div class="mdui-col-md-10 mdui-col-offset-md-1">
			<div class="mdui-card mdui-m-y-3">
				<div class="mdui-card-media">
					<div style="background:url(<?php ShowThumbnail($this); ?>);height:300px;background-position:center center;background-size:cover"></div>
					<div class="mdui-card-media-covered">
						<div class="mdui-card-primary">
							<div class="mdui-card-primary-title"><?php $this->title() ?></div>
						</div>
					</div>
				</div>
				<div class="mdui-card-actions">
					<div class="mdui-chip">
						<?php post_gravatar($this->author,100,'mystery'); ?>
						<span class="mdui-chip-title"><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
					</div>
					<div class="mdui-chip">
						<span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">date_range</i></span>
						<span class="mdui-chip-title"><a href="<?php $this->permalink() ?>"><?php $this->date(); ?></a></span>
					</div>
					<div class="mdui-chip">
						<span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">apps</i></span>
						<span class="mdui-chip-title"><?php $this->category(','); ?></span>
					</div>
					<div class="mdui-chip" mdui-menu="{target:'#posttag<?php echo $this->cid(); ?>',position:'bottom'}">
						<span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">local_offer</i></span>
						<span class="mdui-chip-title">查看标签</span>
					</div>
					<ul class="mdui-menu" id="posttag<?php echo $this->cid(); ?>">
						<?php if (count($this->tags)>0){ ?>
						<li class="mdui-menu-item mdui-ripple"><?php $this->tags('<li class="mdui-menu-item mdui-ripple">',true,''); ?></li>
						<?php } else { ?>
						<li class="mdui-menu-item mdui-ripple"><a>并没有标签QAQ</a></li>
						<?php } ?>
					</ul>
					<div class="mdui-chip">
						<span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">comment</i></span>
						<span class="mdui-chip-title"><a href="<?php $this->permalink() ?>#comments" id="commentsnumber"><?php $this->commentsNum('0 条评论', '1 条评论', '%d 条评论'); ?></a></span>
					</div>
					<?php if ($this->user->hasLogin()):?>
						<a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple mdui-float-right mdui-hidden-sm-down" mdui-tooltip="{content: '编辑该文章', position: 'right'}"><i class="mdui-icon material-icons">edit</i></a>
					<?php endif;?>
					<div class="mdui-divider mdui-m-t-1"></div>
					<div class="mdui-typo mdui-p-y-2" id="post-container" style="padding-left:4%;padding-right:4%;">
		  				<?php echo RewriteContent($this->content); ?>
		  				<?php if ($this->options->copyright){ ?>
		  				<div class="mdui-card">
		  					<div class="mdui-card-content mdui-color-grey-50">
		  						<div><strong>本文链接：</strong><a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></div>
		  						<div><strong>版权声明：</strong><?php echo $this->options->copyright; ?></div>
		  					</div>
		  				</div>
		  				<?php } ?>
					</div>
					<div class="mdui-divider"></div>
					<?php include('comments.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($this->options->posttoc == 'true'){ ?>
<button class="mdui-hidden-xs-down mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple" id="post-tocbtn" style="position:fixed;top:72px;left:16px;z-index:1;border-radius:4px;" mdui-tooltip="{content: '文章目录',position: 'right'}" mdui-menu="{target: '#post-toc',fixed: 'true'}"><i class="mdui-icon material-icons">toc</i></button>
<div class="mdui-menu" id="post-toc"></div>
<?php } ?>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>