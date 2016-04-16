@servers(['web' => $host])

@task('factorio_cleanup')
@endtask

@task('provision_factorio')
    echo 'downloading factorio'
    wget https://www.dropbox.com/s/doq7h0hi2abcu77/factorio_headless_x64_0.12.29.tar.gz

    echo 'unzipping factorio'
    tar -xzf factorio_headless_x64_0.12.29.tar.gz -C /opt

    echo 'creating save dir'
    mkdir -p /opt/factorio/saves
    cd /opt/factorio/saves

    echo 'downloading saves'
    wget https://www.dropbox.com/s/yuwnisnecbirvdv/server_map.zip -O server_map.zip

    echo 'installing git'
    sudo apt-get update
    sudo apt-get install -y git

    echo 'installing startup script'
    cd /opt
    git clone https://github.com/Bisa/factorio-init.git

    echo 'linking init script'
    ln -s -f /opt/factorio-init/factorio /etc/init.d/factorio
    chmod +x /opt/factorio-init/factorio
    wget https://www.dropbox.com/s/bzgakawt40qpqom/config.txt -O /opt/factorio-init/config

    echo 'adding user factorio'
    id -u factorio &>/dev/null || useradd factorio

    chown -R factorio:factorio /opt/factorio
    chmod -R 755 /opt/factorio/saves

    echo 'cleanup'
    rm -rf ~/factorio_headless_x64_0.12.29.tar.gz

    echo 'creating config dir'
    sudo -u factorio mkdir -p /opt/factorio/config
    sudo -u factorio wget https://www.dropbox.com/s/0bzugbk9r0cx3pz/config.ini -O /opt/factorio/config/config.ini
@endtask

