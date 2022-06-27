import { Menu , Input, Dropdown} from "semantic-ui-react";


const SubHeader = ()=>{
    return(
        <Menu secondary pointing>
            <Menu.Item>
                <Input icon='search' placeholder='Username...' />
            </Menu.Item>
            <Menu.Item >
                <Input icon='search' placeholder='Location...' />
            </Menu.Item>
            <Menu.Item name='Language'>
                <Dropdown text='Languages'>
                    <Dropdown.Menu>
                        <Dropdown.Item text='PHP'/>
                        <Dropdown.Item text='Javascript'/>
                        <Dropdown.Item text='HTML'/>
                        <Dropdown.Item text='Css'/>
                        <Dropdown.Item text='Node js'/>
                        <Dropdown.Item text='C++'/>
                        <Dropdown.Item text='Java'/>
                        <Dropdown.Item text='C'/>
                        <Dropdown.Item text='SQL'/>
                        <Dropdown.Item text='XML'/>
                    </Dropdown.Menu>
                </Dropdown>
            </Menu.Item>
        </Menu>
    );
}
export default SubHeader;