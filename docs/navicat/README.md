# Navicat

#### Allow SQL access over the local network

See video [here](https://www.youtube.com/watch?v=f5qQDm3ciDg)

Open MySQL Command Line Client

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'admin';

FLUSH PRIVILEGES;

#### Open port in windows firewall

To access across the network you will need to open the port in windows firewall:

Windows Firewall >Advanced settings > Inbound Rules > New Rule

Port > next > TCP > Specific local ports [add port number from URL] > next > allow connection > check all > next > name the rule > finished.
