import { Menu , Image, Button,Icon, Input, Dropdown} from "semantic-ui-react";
import {Link} from 'react-router-dom';

import logo from '../../../asserts/image/logo.png';

const Header = () => {
    return (
            
                    <Menu secondary pointing>
                        <Image src={logo} size='tiny' circular />
                        <Menu.Item  style={{fontSize:24}}>GitHubDev</Menu.Item>
                        <Menu.Item position='right'>
                            <Button primary basic icon>
                                <Icon color='green' name="sign in"></Icon>
                                 Login
                            </Button>
                        </Menu.Item>
                        <Menu.Item>
                            <Button primary basic icon>
                                <Icon color="red" name="log out"></Icon>
                                Logout
                            </Button>
                        </Menu.Item>
                    </Menu>
                    
            );
            
}

export default Header;