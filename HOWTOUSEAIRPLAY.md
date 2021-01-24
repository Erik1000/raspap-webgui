# How to use [RPiPlay](https://github.com/FD-/RPiPlay) with [Raspap](https://github.com/billz/raspap-webgui)

First follow the steps to build RPiPlay and use `sudo make install` to install it.

When use the quick installer from Raspap and overwrite the repository with this one:

`curl -sL https://install.raspap.com | bash -r Erik1000/raspapwebgui`

Don't forget to change the wifi country or hostapd will fail and you won't be able to connect.

After that Raspap should run as normal execpt there's a new Airplay option.

To make this option work do the following:

create a script called `kill_rpiplay.sh` in `/usr/local/` with the following content:

```
/bin/kill -SIGKILL $(pidof rpiplay)
```

and a second script called `stop_rpiplay.sh` also in `/usr/local/` with the following content:

```
/bin/kill $(pidof rpiplay)
```

Use `chmod +x` to make the files executable.

Then use `visudo` to edit the sudoers file.
Add the following:

```
www-data ALL=(ALL) NOPASSWD:/usr/local/bin/rpiplay,/usr/local/kill_rpiplay.sh,/usr/local/stop_rpiplay.sh
````

Now everything should run.