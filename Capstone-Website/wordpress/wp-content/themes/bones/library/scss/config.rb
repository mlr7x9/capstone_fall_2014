# Compass is a great cross-platform tool for compiling SASS. 
# This compass config file will allow you to 
# quickly dive right in.
# For more info about compass + SASS: http://net.tutsplus.com/tutorials/html-css-techniques/using-compass-and-sass-for-css-in-your-next-project/


#########
require 'net/ssh'
require 'net/sftp'

# 1. Set this to the root of your project when deployed:
http_path = "https://babbage.cs.missouri.edu/~cs4970s14grp4/wordpress/"

# 2. probably don't need to touch these
css_dir = "../css"
sass_dir = "./"
images_dir = "../images"
javascripts_dir = "../js"
environment = :development
relative_assets = true


# 3. You can select your preferred output style here (can be overridden via the command line):
output_style = :expanded

# 4. When you are ready to launch your WP theme comment out (3) and uncomment the line below
#output_style = :compressed

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false

# don't touch this
preferred_syntax = :scss

# note that this is the directory that CSS files will be written. It can be the theme dir
# or a subdirectory (e.g. theme_dir/css). Whatever this path is MUST exist
remote_theme_dir_absolute = 'public_html/wordpress/wp-content/themes/bones/library/css/'

# SFTP Connection Details - Does not support alternate ports os SSHKeys, but could with mods
sftp_host = 'babbage.cs.missouri.edu' # Can be an IP
sftp_user = 'cs4970s14grp4' # SFTP Username
sftp_pass = 'dmVsrNOR3xOqm' # SFTP Password

# Callback to be used when a file change is written. This will upload to a remote WP install
on_stylesheet_saved do |filename|
  $local_path_to_css_file = css_dir + '/' + File.basename(filename)

  Net::SFTP.start( sftp_host, sftp_user, :password => sftp_pass ) do |sftp|
    puts sftp.upload! $local_path_to_css_file, remote_theme_dir_absolute + File.basename(filename)
    end
  puts ">>> Compass is polling for changes. Press Ctrl-C to Stop"
end

