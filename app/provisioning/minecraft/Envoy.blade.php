@servers(['web' => $host])

@task('minecraft_stop')
    service minecraft stop
@endtask

@task('minecraft_start')
    service minecraft start
@endtask

@task('minecraft_provision')
    mkdir -p /home/minecraft
    id -u minecraft &>/dev/null || useradd -d /home/minecraft minecraft

    chown minecraft:minecraft /home/minecraft

    sudo -u minecraft mkdir /home/minecraft/minecraft
    sudo -u minecraft wget https://s3.amazonaws.com/Minecraft.Download/versions/1.9.2/minecraft_server.1.9.2.jar -O /home/minecraft/minecraft/minecraft_server.jar

    sudo apt-get update
    sudo apt-get install -y default-jre
    sudo -u minecraft echo eula=true > /home/minecraft/minecraft/eula.txt

    wget -O /etc/init.d/minecraft "http://minecraft.gamepedia.com/Tutorials/Server_startup_script/Script?action=raw"
    chmod a+x /etc/init.d/minecraft
    update-rc.d minecraft defaults
@endtask
