# GameCraft
Setting up your own gameserver with just one chat message.

## The Story

Dear diary, today I had a super good time playing minecraft and factorio with my colleagues. 
We used GameCraft, a simple application which makes setting up gameservers super easy. Setting up a gameserver was as simple as sending
"/gamecraft start minecraft" in our slack channel. "George the Gamer", did all the other things for us; Starting the server, bootstrapping the server, installing the game and starting the gameserver.
When George was finished he send us the address to connect to and we we're able to play minecraft and factorio straight away.

## Installation

todo

## Use GameCraft

GameCraft can be used in several ways:

- Using the "George the Gamer" as a chatbot in Slack
- Using GameCraft's web interface
- Using GameCraft's command line tool 

##  Using Slack

Modify the .env file and set the endpoint, username and channel for the slack chatbot.

Once done you can send commands to GameCraft using messages. The commands you can send are the same as the ones in which are used for the [command line tool](#using-The-command-line-tool)

## Using The command line tool

The following commands are available in GameCraft's command line tool

```
/gamecraft start {game}
/gamecraft stop {game}
/gamecraft resume {game}</pre>
```

## Using the web interface

todo


## License

GameCraft is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
