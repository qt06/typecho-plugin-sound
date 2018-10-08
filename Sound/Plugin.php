<?php
/**
 * 提示音效
 * 
 * @package  提示音效
 * @author 杨永全
 * @version 1.0.0
 * @dependence 14.10.10-*
 * @link http://www.qt06.com
 */
class Sound_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        //Typecho_Plugin::factory('Widget_Abstract_Contents')->filter = array('plyr_Plugin','filter');
        //Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('plyr_Plugin', 'parse');
        //Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('plyr_Plugin', 'parse');
        //Typecho_Plugin::factory('Widget_Archive')->header = array('plyr_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array(
            'Sound_Plugin',
            'footer'
        );
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }
    
    /**
     * 输出尾部js
     * 
     * @access public
     * @param unknown $header
     * @return void
     */
    public static function footer($widget)
    {
        $sndDir    = Helper::options()->pluginDir() . '/Sound/';
        $sndUrlPre = Helper::options()->pluginUrl . '/Sound/';
        $sndUrl    = '';
        if ($widget->is('post')) {
            if (file_exists($sndDir . 'post_' . $widget->cid . '.mp3')) {
                $sndUrl .= 'post_' . $widget->cid . '.mp3';
            } elseif (file_exists($sndDir . 'post.mp3')) {
                $sndUrl .= 'post.mp3';
            }
        } else if ($widget->is('page')) {
            if (file_exists($sndDir . 'page_' . $widget->slug . '.mp3')) {
                $sndUrl .= 'page_' . $widget->slug . '.mp3';
            } else if (file_exists($sndDir . 'page.mp3')) {
                $sndUrl .= 'page.mp3';
            }
        } else if ($widget->is('attachment')) {
            if (file_exists($sndDir . 'attachment.mp3')) {
                $sndUrl .= 'attachment.mp3';
            }
        } else if ($widget->is('single')) {
            if (file_exists($sndDir . 'single.mp3')) {
                $sndUrl .= 'single.mp3';
            }
        } else if ($widget->is('tag')) {
            if (file_exists($sndDir . 'tag_' . $widget->slug . '.mp3')) {
                $sndUrl .= 'tag_' . $widget->slug . '.mp3';
            } else if (file_exists($sndDir . 'tag.mp3')) {
                $sndUrl .= 'tag.mp3';
            }
        } else if ($widget->is('category')) {
            if (file_exists($sndDir . 'category_' . $widget->slug . '.mp3')) {
                $sndUrl .= 'category_' . $widget->slug . '.mp3';
            } else if (file_exists($sndDir . 'category.mp3')) {
                $sndUrl .= 'category.mp3';
            }
        } else if ($widget->is('date')) {
            if (file_exists($sndDir . 'date.mp3')) {
                $sndUrl .= 'date.mp3';
            }
        } else if ($widget->is('archive')) {
            if (file_exists($sndDir . 'archive.mp3')) {
                $sndUrl .= 'archive.mp3';
            }
        } else if ($widget->is('index')) {
            if (file_exists($sndDir . 'index.mp3')) {
                $sndUrl .= 'index.mp3';
            }
        } else {
            if (file_exists($sndDir . 'default.mp3')) {
                $sndUrl .= 'default.mp3';
            }
        }
        if (empty($sndUrl)) {
            $sndUrl = 'default.mp3';
        }
        if (file_exists($sndDir . $sndUrl)) {
            $sndUrl = $sndUrlPre . $sndUrl;
            echo '
<script>
(function() {
var a = new Audio("' . $sndUrl . '");
a.volume = 0.5;
a.play();
})();
</script>';
            
        }
    }
    
}
